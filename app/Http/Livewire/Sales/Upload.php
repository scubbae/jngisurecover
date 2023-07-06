<?php

namespace App\Http\Livewire\Sales;


use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\Content;

class Upload extends Component
{
    use WithFileUploads;

    //upload fields
    public $motor_form;
    public $photo_id;
    public $trn;
    public $fitness;
    public $certificate;
    public $import;
    public $proforma_invoice;
    public $valuation_report;
    public $claim_discount;
    public $jnbank_acc_verified;

    public $uploadedFiles = [];
    public $sales_id;
    public $first_name;
    public $last_name;
    public $branch;



    protected $rules = [
            'motor_form' => 'required|max:1024',
            'photo_id' => 'required|max:1024',
            'trn' => 'required|max:1024',
            'import' => 'required|max:1024',
            'proforma_invoice' => 'required|max:1024',
            'valuation_report' => 'required|max:1024',
            'claim_discount' => 'required|max:1024',
            'jnbank_acc_verified' => 'required|max:1024',
            'first_name' => 'required',
            'last_name' => 'required',
            'branch' => 'required',
        ];

    public function mount()
    {
         $this->sales_id = session('sales_id');
    }
    public function save()
    {
        $this->validate();


        // Store each file with a custom name
        $motorFormName = $this->storeFile($this->motor_form, 'motor_form');
        $photoIdName = $this->storeFile($this->photo_id, 'photo_id');
        $trnName = $this->storeFile($this->trn, 'trn');
        $fitnessName = $this->storeFile($this->fitness, 'fitness');
        $certificateName = $this->storeFile($this->certificate, 'certificate');
        $importName = $this->storeFile($this->import, 'import');
        $proformaInvoiceName = $this->storeFile($this->proforma_invoice, 'proforma_invoice');
        $valuationReportName = $this->storeFile($this->valuation_report, 'valuation_report');
        $claimDiscountName = $this->storeFile($this->claim_discount, 'claim_discount');
        $jnbankAccVerifiedName = $this->storeFile($this->jnbank_acc_verified, 'jnbank_acc_verified');

        // Create a JSON object literal with file URLs
        $fileUrls = [
            'motor_form' => $motorFormName ? Storage::url('documents/'.$motorFormName) : null,
            'photo_id' => $photoIdName ? Storage::url('documents/'.$photoIdName) : null,
            'trn' => $trnName ? Storage::url('documents/'.$trnName) : null,
            'fitness' => $fitnessName ? Storage::url('documents/'.$fitnessName) : null,
            'certificate' => $certificateName ? Storage::url('documents/'.$certificateName) : null,
            'import' => $importName ? Storage::url('documents/'.$importName) : null,
            'proforma_invoice' => $proformaInvoiceName ? Storage::url('documents/'.$proformaInvoiceName) : null,
            'valuation_report' => $valuationReportName ? Storage::url('documents/'.$valuationReportName) : null,
            'claim_discount' => $claimDiscountName ? Storage::url('documents/'.$claimDiscountName) : null,
            'jnbank_acc_verified' => $jnbankAccVerifiedName ? Storage::url('documents/'.$jnbankAccVerifiedName) : null,
        ];

        // Convert the array to JSON
        $jsonObject = json_encode($fileUrls);

        // Store or handle the JSON object as needed
        $content = new Content;

        $content->file = $jsonObject;
        $content->first_name = $this->first_name;
        $content->last_name = $this->last_name;
        $content->branch = $this->branch;
        $content->user_id = $this->sales_id;
        $content->status = 0;
        $content->save();

        // Reset the input fields
        $this->reset();

        session()->flash('success', 'File(s) uploaded successfully');
        return redirect('/sales/upload');

    }

    private function storeFile($file, $fieldName)
    {
        if ($file) {
            // Generate a custom file name
            $fileName = $fieldName . '_' . time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the storage/app/public directory
            $file->storeAs('documents', $fileName, 'public');

            return $fileName;
        }

        return null;
    }

    public function render()
    {
        return view('livewire.sales.upload');
    }
}

<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Content;

class Document extends Component
{
    use WithFileUploads;

    public $file_id;
    public $select_id = array();

    public $doctype;
    public $file;

    protected $rules = [
        'doctype' => 'required',
        'file' => 'required|max:1024'
    ];

    public function addFile()
    {
        $this->validate();

        $files = Content::find($this->file_id);

        $jsonData = $files->file;

        // Decode the JSON data into a PHP associative array
        $arrayData = json_decode($jsonData, true);


        // Encode the updated PHP array back into JSON
        $updatedJsonData = json_encode($arrayData, JSON_PRETTY_PRINT);

        $files->file = $updatedJsonData;
        $files->save();

        session()->flash('success', 'File(s) successfully Added');
        return redirect()->to('/sales/documents/'.$this->file_id);
    }

    public function delete()
    {
        $files = Content::find($this->file_id);

        $jsonData = $files->file;

        // Decode the JSON data into a PHP associative array
        $arrayData = json_decode($jsonData, true);

        // Remove the key-value pair
        foreach($this->select_id as $item){
            unset($arrayData[$item]);
        }

        // Encode the updated PHP array back into JSON
        $updatedJsonData = json_encode($arrayData, JSON_PRETTY_PRINT);

        $files->file = $updatedJsonData;
        $files->save();

        session()->flash('success', 'File(s) successfully removed');
        return redirect()->to('/sales/documents/'.$this->file_id);

    }
    public function render()
    {
        $files = Content::find($this->file_id);
        return view('livewire.sales.document', ['files'=>$files]);
    }
}

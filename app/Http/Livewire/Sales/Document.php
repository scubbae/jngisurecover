<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
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
        // Validate $this->file_id to ensure it's a valid ID before proceeding
        $files = Content::find($this->file_id);

        // Check if the record exists before continuing
        if (!$files) {
            session()->flash('error', 'File not found');
            return redirect()->to('/sales/documents');
        }

        $jsonData = $files->file;

        // Validate JSON data before proceeding
        if (!$jsonData || !is_string($jsonData)) {
            session()->flash('error', 'Invalid JSON data');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        // Decode the JSON data into a PHP associative array
        $arrayData = json_decode($jsonData, true);

        // Check if the decoded data is an array
        if (!is_array($arrayData)) {
            session()->flash('error', 'Invalid JSON format');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        $this->validate();

        $path = $this->file->store('documents','public');


        // // Validate inputs doctype and file
        // $doctype = $this->doctype('doctype');
        // $file = $this->file('file');

        // if (!$doctype || !$file) {
        //     session()->flash('error', 'Invalid input values');
        //     return redirect()->to('/sales/documents/'.$this->file_id);
        // }

        // Add the key-value pair to the arrayData
        $arrayData[$this->doctype] = $path;

        // Encode the updated PHP array back into JSON
        $updatedJsonData = json_encode($arrayData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // Check if the JSON encoding was successful
        if ($updatedJsonData === false) {
            session()->flash('error', 'Failed to update JSON data');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        // Update the "file" attribute and save changes
        $files->file = $updatedJsonData;
        $files->save();

        session()->flash('success', 'File Uploaded successfully');
        return redirect()->to('/sales/documents/'.$this->file_id);
    }

    public function delete()
    {
        // Validate $this->file_id to ensure it's a valid ID before proceeding
        $files = Content::find($this->file_id);

        // Check if the record exists before continuing
        if (!$files) {
            session()->flash('error', 'File not found');
            return redirect()->to('/sales/documents');
        }

        $jsonData = $files->file;

        // Validate JSON data before proceeding
        if (!$jsonData || !is_string($jsonData)) {
            session()->flash('error', 'Invalid JSON data');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        // Decode the JSON data into a PHP associative array
        $arrayData = json_decode($jsonData, true);

        // Check if the decoded data is an array
        if (!is_array($arrayData)) {
            session()->flash('error', 'Invalid JSON format');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        // Validate $this->select_id to ensure it's an array before proceeding
        if (!is_array($this->select_id)) {
            session()->flash('error', 'Invalid selection');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        // Remove the key-value pair if the key exists
        foreach ($this->select_id as $item) {
            if (array_key_exists($item, $arrayData)) {
                unset($arrayData[$item]);
            }
        }

        // Encode the updated PHP array back into JSON
        $updatedJsonData = json_encode($arrayData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // Check if the JSON encoding was successful
        if ($updatedJsonData === false) {
            session()->flash('error', 'Failed to update JSON data');
            return redirect()->to('/sales/documents/'.$this->file_id);
        }

        // Update the "file" attribute and save changes
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

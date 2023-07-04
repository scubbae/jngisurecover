<?php

namespace App\Http\Livewire\Agents;


use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class Upload extends Component
{
    use WithFileUploads;
    
    public $inputGroups = [];
    public $uploadedFiles = [];
    public $select_ids = [];
    public $spinner = false;
    public $user_id;
    public $client_name;
    public $branch;
    
    protected $rules = [
            'uploadedFiles' => 'required|max:1024',
            'client_name' => 'required',
            'branch' => 'required',
        ];
    public function mount()
    {
         $this->agent_id = session('agent_id');
    }
    public function deleteSelect()
    {
        DB::table('contents')->whereIn('id', $this->select_ids)->delete();
        $this->select_ids = [];
        
        session()->flash('delete', 'File(s) removed successfully');
        return redirect('/agent/upload');
    }
    public function addInputGroup()
    {
        $this->inputGroups[] = count($this->inputGroups) + 1;
        $this->uploadedFiles = [];
    }

    public function removeInputGroup($index)
    {
        unset($this->inputGroups[$index]);
        unset($this->uploadedFiles[$index]);
        $this->inputGroups = array_values($this->inputGroups);
        $this->uploadedFiles = array_values($this->uploadedFiles);
    }

    public function save()
    {
        $this->validate();
        
        $this->spinner = true;
        
        foreach ($this->uploadedFiles as $file) {
            $path = $file->store('documents','public');
            $filename = $file->getClientOriginalName();
        
            DB::table('contents')->insert(
                [
                    'file'=> $path, 
                    'client_name'=>$this->client_name,
                    'branch' => $this->branch,
                    'user_id'=> $this->agent_id
                ]
            );
        }
        
        // Reset the uploaded files array
        $this->uploadedFiles = [];
        
        session()->flash('success', 'File(s) uploaded successfully');
        return redirect('/agent/upload');
        
    }

    public function render()
    {
        return view('livewire.agents.upload');
    }
}

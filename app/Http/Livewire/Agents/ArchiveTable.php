<?php

namespace App\Http\Livewire\Agents;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Archive;
use Livewire\WithPagination;


class ArchiveTable extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';



    public $file_url;
    public $file_name;
    public $file_id;
    public $fileData;
    
    public $select_id = array();
    
    public function mount()
    {
         $this->agent_id = session('agent_id');
    }
    public function detail($id)
    {
        $this->fileData = Archive::find($id);
        
    }
    public function delete($id)
    {
        $this->fileData = Content::destroy($id);
        session()->flash('delete', 'File(s) removed successfully');
        return redirect('/agent/documents');
    }
    public function render()
    {
        return view('livewire.agents.archive-table',[
            'files' => DB::table('archives')->where('user_id',$this->agent_id)->paginate(10),
        ]);
    }
}
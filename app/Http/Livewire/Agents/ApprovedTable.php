<?php

namespace App\Http\Livewire\Agents;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Content;

class ApprovedTable extends Component
{
    public $fileData;
    
    public $fileDetails = [];
    
    
    public function detail($id)
    {
        $this->fileData = Content::find($id);
    }
    public function delete($id)
    {
        $this->fileData = Content::destroy($id);
    }
    public function render()
    {
        $agent_id = session('$agent_id');
        
        $approveds = DB::table('approveds')->where('user_id', $agent_id)->get();
        
        return view('livewire.agents.approved-table', ['approveds'=>$approveds]);
    }
}

<?php

namespace App\Http\Livewire\Agents;

use Livewire\Component;
use App\Models\Archive;

class RecentArchive extends Component
{
    public $agent_id;
    
    public function mount()
    {
         $this->agent_id = session('agent_id');
    }
    public function render()
    {
        $archive = Archive::where('user_id',$this->agent_id )->get();
        return view('livewire.agents.recent-archive', ['archive'=>$archive]);
    }
}

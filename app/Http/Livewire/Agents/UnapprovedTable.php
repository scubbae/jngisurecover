<?php

namespace App\Http\Livewire\Agents;
use Illuminate\Support\Facades\DB;


use Livewire\Component;

class UnapprovedTable extends Component
{
    public function render()
    {
        $agent_id = session('agent_id');
        
        $approveds = DB::table('approveds')->where('user_id', $agent_id)->get();
        return view('livewire.agents.unapproved-table',['approveds'=>$approveds]);
    }
}

<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Archive;

class RecentArchive extends Component
{
    public $sales_id;

    public function mount()
    {
         $this->sales_id = session('sales_id');
    }
    public function render()
    {
        $archive = Archive::where('user_id',$this->sales_id )->get();
        return view('livewire.sales.recent-archive', ['archive'=>$archive]);
    }
}

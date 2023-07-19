<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Content;

class Processing extends Component
{
    public function render()
    {
        $content = Content::where('status', 0)->get();
        return view('livewire.sales.processing',['contents' => $content]);
    }
}

<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use App\Models\Content;

class Complete extends Component
{
    public function render()
    {
        $content = Content::where('status', 1)->get();
        return view('livewire.sales.complete', ['contents'=>$content]);
    }
}

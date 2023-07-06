<?php

namespace App\Http\Livewire\Agents;

use Livewire\Component;
use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class DocumentsTable extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $searchInput;
    public $searchQuery;

    public $status;
    public $comment;
    public $file;
    public $fileDetail;

    public $loading ;

    protected $rules = [
        'file' => 'required',
        'cooment' => 'required',
    ];

    public function details($id)
    {
        $this->fileDetail = Content::find($id)->first();
    }
    public function search()
    {
        $this->searchQuery = $this->searchInput;
    }
    public function uploadQuote($id)
    {
        $path = $this->file->store('documents','public');

        $this->status = 1;

        $results = DB::table('contents')->where('id', $id)->update(
                [
                'quote'=> $path,
                'status'=> $this->status,
                'comment'=>$this->comment,
                ]
            );
        if($results){
            $this->file;
            session()->flash('success', 'Quote uploaded successfully');
            return redirect()->to('/agents');
        }
    }
    public function render()
    {
        $query = DB::table('contents');

        if ($this->searchQuery) {
            $query->where('name', 'like', '%' . $this->searchQuery . '%')->orWhere('branch', 'like', '%' . $this->searchQuery . '%');
        }

        $contents = $query->paginate(10);

        return view('livewire.agents.documents-table',  ['contents' => $contents]);
    }
}

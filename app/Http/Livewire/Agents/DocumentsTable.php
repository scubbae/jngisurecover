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

    public $file_url;
    public $file_name;
    public $file_id;
    public $fileData;
    public $agent_id;
    public $file;

    public $searchInput;
    public $searchQuery;

    public $layout = 'grid';

    public $select_id = array();

    public $status;
    public $comment;

    public function list_layout()
    {
        $this->layout = 'list';
    }
    public function grid_layout()
    {
        $this->layout = 'grid';
    }

    public function detail($id)
    {
        $this->fileData = Content::find($id);

    }
    public function search()
    {
        $this->searchQuery = $this->searchInput;
    }
    public function uploadQuote($id)
    {
        $this->status = 'Approved';

        $path = $this->file->store('documents','public');

        $results = DB::table('contents')->where('id', $id)->update(
                [
                'quote'=> $path,
                'status'=> $this->status,
                'comment'=>$this->comment,
                ]
            );
        if($results){
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

        $files = $query->paginate(10);

        return view('livewire.agents.documents-table',  ['files' => $files]);
    }
}

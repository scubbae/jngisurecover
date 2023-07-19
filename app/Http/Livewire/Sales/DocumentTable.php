<?php

namespace App\Http\Livewire\Sales;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Content;
use App\Models\Archive;
use Illuminate\Support\Facades\DB;


class DocumentTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';



    public $file_url;
    public $file_name;
    public $file_id;
    public $fileData;
    public $sales_id;

    public $searchInput;
    public $searchQuery;


    public $layout = 'grid';

    public $select_id = array();

    public function list_layout()
    {
        $this->layout = 'list';
    }
    public function grid_layout()
    {
        $this->layout = 'grid';
    }
    public function all_checkbox_ids()
    {
        $this->select_id = true;
    }
    public function mount()
    {
         $this->sales_id = session('sales_id');
    }
    public function detail($id)
    {
        $this->fileData = Content::find($id);

    }
    public function delete($id)
    {
        $this->fileData = Content::destroy($id);
        session()->flash('delete', 'File(s) removed successfully');
        return redirect('/sales/documents');
    }
    public function archive($id)
    {
        $this->fileData = Content::find($id);

        $archive = new Archive;

        $archive->file = $this->fileData->file;
        $archive->filename = $this->fileData->filename;
        $archive->user_id = $this->fileData->user_id;
        $archive->save();

        $results = Content::destroy($id);

        if($results){
            session()->flash('success', 'File(s) archived');
            return redirect('/sales/documents');
        }

    }
    public function search()
    {
        $this->searchQuery = $this->searchInput;
    }
    public function render()
    {
        $query = DB::table('contents')->where('user_id', $this->sales_id);

        if ($this->searchQuery) {
            $query->where('name', 'like', '%' . $this->searchQuery . '%')->orWhere('branch', 'like', '%' . $this->searchQuery . '%');
        }

        $files = $query->paginate(10);

        return view('livewire.sales.document-table', [
            'files' => $files,
        ]);
    }

}

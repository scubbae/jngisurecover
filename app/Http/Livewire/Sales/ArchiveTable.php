<?php

namespace App\Http\Livewire\Sales;

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
    public $sales_id;

    public $select_id = array();

    public function mount()
    {
         $this->sales_id = session('sales_id');
    }
    public function detail($id)
    {
        $this->fileData = Archive::find($id);

    }
    public function delete($id)
    {
        $this->fileData = Content::destroy($id);
        session()->flash('delete', 'File(s) removed successfully');
        return redirect('/sales/documents');
    }
    public function render()
    {
        return view('livewire.agents.archive-table',[
            'files' => DB::table('archives')->where('user_id',$this->sales_id)->paginate(10),
        ]);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Contactpage extends Component
{
    use WithPagination;

    public $username;

    public $posts, $title, $body, $post_id;
    public $isOpen=0;

    public $searchTerm = '';
    public $page = 1;
    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    public $readyToLoad = false;

    public function loadContacts()
    {
        $this->readyToLoad = true;
    }

    protected $rules = [
        'title' => 'required|max:255',
        'author.name' => 'required',
        'body' => 'required',
    ];

    //protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function storePostInformation()
    {
        $this->validate();

        // 保存文章信息操作
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
    }

    public $sortBy = 'id';
    public $sortDirection = 'desc';

    public function mount()
    {

        $this->username=auth()->user()->name;
        $this->fill(request()->only('searchTerm', 'page'));

    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $uid=auth()->user()->id;

        return view('livewire.contactpage',[
            'customers'=>\App\Models\Customer::where('user_id','=',$uid)  //'customers'=>$this->readyToLoad?\App\Models\Customer::where('user_id','=',$uid)
        ->where('name', 'like', $searchTerm)->orderBy($this->sortBy,$this->sortDirection)->paginate(10)
        ]);
    }

//    public function paginationView()
//    {
//        return 'simple-tailwind';
//    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
//        $this->validate([
//            'title' => 'required',
//            'body' => 'required',
//        ]);
//
//        Post::updateOrCreate(['id' => $this->post_id], [
//            'title' => $this->title,
//            'body' => $this->body
//        ]);
//
//        session()->flash('message',
//            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');
//
//        $this->closeModal();
//        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
//        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = "a";//$post->title;
        $this->body =  "b";//$post->body;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        //Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
        //return redirect()->to('/contact');
    }
}

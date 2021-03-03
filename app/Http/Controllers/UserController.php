<?php

namespace App\Http\Controllers;

use Admin;
use App\Models\Buyer;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\DataBaseBank;
use App\Models\tag;
use App\Models\Taggable;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::create([
            "name" => "korykim",
            "email" => "korykim@example.com",
            "password" => \Hash::make("korykim")
        ]);

        return $user;
    }
    public function addadmin(){

    }

    public function test()
    {
        $buyer = Buyer::with('buyerpeoples','tags')->findOrFail(1);
        $buyer->tags;
        return $buyer;
    }

    public function cc(){
        $customer=Customer::with('customerpeoples','tags','contacts')->findOrFail(7);
        $customer->tags;
        return $customer;

    }

    public function query(){


        $province='广东';
        $city=''; //广州
        $personal=0; //社保人数
        $companyname='商贸'; //商贸
        $industry='批发'; //化妆品
        $scope='化妆品';
        $limit=10;

        $dbs=DataBaseBank::where('province','=',$province)
            ->where('scope', 'LIKE', '%'.$scope.'%')
            ->where('companyname', 'LIKE', '%'.$companyname.'%')
            ->where('personal','>=',$personal)
            ->where('industry', 'LIKE','%'.$industry.'%')
            ->whereNotNull('email')
            //->whereNotNull('tel1')
            ->where('city', 'LIKE','%'.$city.'%')
//            ->havingRaw("tel1 REGEXP '^[1][3456789][0-9]{9}$'")
//            ->orHavingRaw("tel2 REGEXP '^[1][3456789][0-9]{9}$'")
            ->limit($limit)
            ->orderByDesc('personal')
            ->get();

        //$dbs2=DB::table('data_base_banks')->whereRaw("tel1 REGEXP '^[1][35678][0-9]{9}$'")->get(); //^[^0-9a-zA-Z]

        return $dbs;
    }

    public function dd(){
//        $customer=Customer::where('id', '=',7)->firstOrFail();
//
//        return $customer;

//        $cc=Contact::findOrFail(3);
//        $cc->customer_id;
//        $cc->buyer_id;
//        return $cc->buyer_id;
        //return DB::table('customers')->orderBy('id','desc')->paginate(1);

        $user=User::with('customers','buyers','contacts')->findOrFail(1);

        $user->customers;
        $user->buyers;
        $user->contacts;


        return $user;


    }

    public function op(){
//        $user = User::where('name','=',"kotra")->first();
//        return $user->id;

        return $this->getModels();
    }
    public function adx(){

        //$tag = Tag::find(1);
        //dd($tag->customers);

//        $tas=taggable::all();
//        dd($tas);
//
        $bb=buyer::find(2);

        $tag = new Tag;
        $tag->name = "ItSolutionStuff.com";

        $rs=$bb->tags()->save($tag);

        dd($rs);


//        $buyer = Buyer::find(2);
//
//        $tag1 = new Taggable;
//        $tag1->tag_id = 3;
//        $tag1->taggable_id = 1;
//
//        $tag2 = new Taggable;
//        $tag2->tag_id = 4;
//        $tag1->taggable_id = 1;
//
//
//
//        $result=$buyer->taggable()->saveMany([$tag1, $tag2]);
//        return $result;
    }

    /**
     * 获取所有model
     * @return Collection
     */
    function getModels(): Collection
    {
        $models = collect(File::allFiles(app_path()))
            ->map(function ($item) {
                $path = $item->getRelativePathName();
                $class = sprintf('\%s%s',
                    Container::getInstance()->getNamespace(),
                    strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                return $class;
            })
            ->filter(function ($class) {
                $valid = false;

                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }

                return $valid;
            });

        return $models->values();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

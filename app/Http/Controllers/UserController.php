<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Customer;
use App\Models\tag;
use App\Models\Taggable;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function test()
    {
        $buyer = Buyer::with('buyerpeoples','tags')->findOrFail(1);
        $buyer->tags;
        return $buyer;
    }
    public function cc(){
        $customer=Customer::with('customerpeoples','tags')->findOrFail(7);
        $customer->tags;
        return $customer;

    }

    public function dd(){
        $customer=Customer::where('id', '=',7)->firstOrFail();

        return $customer;
    }

    public function op(){
        $user = User::where('name','=',"kotra")->first();
        return $user->id;
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

<?php

namespace App\Admin\Actions\Form;


use App\Models\Contact;

use App\Models\tag;
use Dcat\Admin\Widgets\Form;


class ContactSelectList extends Form
{

    public function handle(array $input)
    {

       $bb=Contact::findOrFail($input['select']);
//
//        foreach($input['tags'] as $tt){
//            $tag = new Tag;
//            $tag->name =$tt;
//            $bb->tags()->save($tag);
//        }
//
//        return $this->response()->success('1');


        //$tagNames = explode(','$request->get('tags'));
        $tagIds = [];
        foreach($input['tags'] as $tagName)
        {
            //这个代码是不替换，只增加tag
            //$post->tags()->create(['name'=>$tagName]);
            //
            //下面代码是只保留刚刚提交上的tag
            $tag=tag::firstOrCreate(['name'=>$tagName]);
            if($tag)
            {
                $tagIds[] = $tag->id;
            }

        }
        $bb->tags()->sync($tagIds);
        return $this->response()->success(json_encode($tagIds))->refresh();

    }
    public function form()
    {
        $contact=Contact::all();
        $tag=Tag::all();

        //$this->text('text','标签')->rules('required', ['required' => '标签不能为空']);
        $this->select('select','选择工作')->options($contact->pluck('title','id'))->rules('required', ['required' => '工作不能为空']);
        $this->tags('tags','标签')->options($tag->pluck('name','id'))->rules('required', ['required' => '标签不能为空']);


    }

}

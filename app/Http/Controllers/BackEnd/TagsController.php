<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;

class TagsController extends BackEndController

{

    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function filter($users)
    {
        if (request()->has('name') && request()->get('name') != "")
        {
            $users=$users->where('name', request()->get('name'));
        }
        return $users;
    }

    public function store(Store $request){

        $this->model->create($request->all());
        return redirect()->route('tags.index');
    }


    public function update(Store $request,$id){
        $users = $this->model->FindOrFail($id);
        $users->update($request->all());

        return redirect()->route('tags.edit',  $users->id);
    }


}

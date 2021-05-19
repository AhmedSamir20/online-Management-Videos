<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\Backend\Skills\Store;
use App\Models\Skill;

class SkillsController extends BackEndController
{

    public function __construct(Skill $model)
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
        return redirect()->route('skills.index');
    }


    public function update(Store $request,$id){
        $users = $this->model->FindOrFail($id);
        $users->update($request->all());

        return redirect()->route('skills.edit',  $users->id);
    }




}

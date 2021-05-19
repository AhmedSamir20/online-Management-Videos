<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends BackEndController
{

    public function __construct(User $model)
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
            // dd($request->all());
        $requestArray=$request->all();
        $requestArray['password']=Hash::make( $requestArray['password']);
      User::create($requestArray);
        return redirect()->route('users.index');
    }


    public function update(Update $request,$id){
        $users = $this->model->FindOrFail($id);

        $requestArray=$request->all();

            if ( isset($requestArray['password']) && $requestArray['password'] != "")
            {

                $requestArray['password']= Hash::make($requestArray['password']);
            }
            else{

                unset( $requestArray['password']);
            }
            //dd($requestArray);
                    $users->update($requestArray);
        return redirect()->route('users.edit',  $users->id);
    }




}

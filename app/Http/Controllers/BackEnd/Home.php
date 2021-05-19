<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class Home extends BackEndController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function index(){
        $comments=Comment::with('user','video')->orderby('id','desc')->paginate(6);
        return view('back-end.home', compact('comments'));
    }


}

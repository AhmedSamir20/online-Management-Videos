<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplyContect;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class MessagesController extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replay($id, Store $request){
        $message=$this->model->findOrFail($id);
        Mail::send(new ReplyContect($message, $request->message));
       return redirect()->route('messages.edit',['id'=>$message->id]);

    }
}

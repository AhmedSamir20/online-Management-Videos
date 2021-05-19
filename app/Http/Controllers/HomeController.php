<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Comments\Store;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([

            'commentUpdate',
            'commentStore',
            'profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {

        $videos=Video::published()->orderBy('id','desc');
        if(request()->has('search') && request()->get('search') != ''){
            $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('home',compact('videos'));
    }

//
    public function category($id){
        $cat = Category::findOrFail($id);
        $videos = Video::published()->where('cat_id' , $id)->orderBy('id' , 'desc')->paginate(30);
        return view('FrontEnd.category.index' , compact('videos' , 'cat'));
    }
    public function skills($id){
        $skill = Skill::findOrFail($id);
        $videos = Video::published()->whereHas('skills' , function ($query) use ($id){
            $query->where('skill_id' , $id);
        })->orderBy('id' , 'desc')->paginate(30);
        return view('FrontEnd.skill.index' , compact('videos' , 'skill'));
    }
   public function tags($id){
        $tag = Tag::findOrFail($id);
        $videos = Video::published()->whereHas('tags' , function ($query) use ($id){
            $query->where('tag_id' , $id);
        })->orderBy('id' , 'desc')->paginate(30);
        return view('FrontEnd.tag.index' , compact('videos' , 'tag'));
    }

    public function video($id){
        $video = Video::published()->with('skills','tags','cat','user','comments.user')->findOrFail($id);
        return view('FrontEnd.video.index' , compact('video'));
    }


        public  function commentUpdate($id , Store $request){
        $comment=Comment::findOrFail($id);
        if(($comment->user_id == auth()->user()->id)||auth()->user()->group=='admin'){

            $comment->update(['comment' => $request->comment]);
            alert()->success('Your Comment Has Been Update' , 'Done');


        }else{
            alert()->error('we did not found this comment' , 'Done');
        }

            return redirect()->route('frontend.video',['id'=>$comment->video_id ,'#comments']);

        }


        public  function commentStore($id , Store $request){
        $video=Video::published()->findOrFail($id);
            Comment::create([
                'user_id' => auth()->user()->id,
                'video_id' => $video->id,
                'comment' => $request->comment
            ]);
            alert()->success('Your Comment Has Been Added' , 'Done');
            return redirect()->route('frontend.video',['id'=>$video->id ,'#comments']);

        }
    public function MassageStore( \App\Http\Requests\FrontEnd\Messages\Store $request){
        Message::create($request->all());
        alert()->success('You message have been saved , we will call you n 24 hour' , 'Done');
        return redirect()->route('home.page');

    }

    public function welcome(){
        $videos = Video::published()->orderBy('id' , 'desc')->paginate(9);
        $videos_count =Video::published()->count();
        $comments_count =Comment::count();
        $tags_count =Tag::count();
        return view('welcome',compact('videos','videos_count','comments_count','tags_count'));
    }

    public function page($id ,$slug=null){

        $page=Page::findOrFail($id);
        return view('FrontEnd.page.index',compact('page'));
    }


public function profile($id ,$slug=null){

        $user=User::findOrFail($id);

        return view('FrontEnd.profile.index',compact('user'));
    }

    public function profileUpdate(\App\Http\Requests\FrontEnd\User\Store $request){
            $user=User::findOrFail(auth()->user()->id);
            $array=[];
            if ($request->email !=$user->email){
                $email= User::where('email',$request->email)->first();
                if($email==null){
                $array['email']=$request->email;
                }
            }

            if ($request->name !=$user->name){
                $array['name']=$request->name;
            } if ($request->password !=''){
            $array['password'] =  Hash::make($request->password);
            }

        if(!empty($array)){
            $user->update($array);
        }
        alert()->success('Your Profile Has Been Updated' , 'Done');
        return redirect()->route('front.profile',['id'=>$user->id , 'slug'=>slug($user->name)]);
    }
}


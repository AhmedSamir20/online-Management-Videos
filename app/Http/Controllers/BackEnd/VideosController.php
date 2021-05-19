<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Videos\Store;
use App\Http\Requests\Backend\Videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;

class VideosController extends BackEndController
{
    use CommentTrait;

    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    protected function with()
    {
        return ['cat', 'user'];
    }

    protected function append()
    {
        $array =  [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];
        if(request()->route()->parameter('video')){
            $array['selectedSkills']  = $this->model->find(request()->route()->parameter('video'))
                ->skills()->pluck('skills.id')->toArray();
            $array['selectedTags']  = $this->model->find(request()->route()->parameter('video'))
                ->tags()->pluck('tags.id')->toArray();
            $array['comments']  = $this->model->find(request()->route()->parameter('video'))
                ->comments()->orderBy('id' , 'desc')->with('user')->get();
        }
        return $array;
    }

    public function store(Store $request)
    {
        $fileName = $this->uploadImage($request);
        $requestArray =  ['user_id' => auth()->user()->id , 'image' => $fileName] + $request->all();
        $users = $this->model->create($requestArray);
        $this->syncTagsSkills($users , $requestArray);

        return redirect()->route('videos.index');
    }

    public function update($id, Update $request)
    {
        $requestArray = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->uploadImage($request);
            $requestArray = ['image' => $fileName] + $requestArray;
        }
        $users = $this->model->FindOrFail($id);
        $users->update($requestArray);
        $this->syncTagsSkills($users , $requestArray);

        return redirect()->route('videos.edit', ['id' => $users->id]);
    }

    protected function syncTagsSkills($users , $requestArray){
        if (isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $users->skills()->sync($requestArray['skills']);
        }
        if (isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $users->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request){
        $file = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads') , $fileName);
        return $fileName;
    }
}

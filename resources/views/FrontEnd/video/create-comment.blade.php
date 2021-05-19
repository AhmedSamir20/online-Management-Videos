@if(auth()->user())
    <form  action="{{route('front.commentStore',['id'=>$video->id])}}" method="post">
        {{csrf_field()}}

        <label for="" style="font-weight: bold">Add Comment</label>
        <div class="form-group">
            <textarea  name="comment" class="form-control" id="comments" rows="3"></textarea>
        </div>
        <button  class="btn btn-default" type="submit" >Add comment</button>
    </form>
@endif

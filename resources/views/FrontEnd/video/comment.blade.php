<div class="card card-nav-tabs">
    @php $comments=$video->comments@endphp

    <h4 class="card-header card-header-info">Comments ({{count($comments)}})</h4>
    <div class="card-body">



        @foreach($comments as $comment)

            <div class="row" id="comments">

                <div class="col-md-8">
                    <a href="">
                        <i class="nc-icon nc-chat-33"></i> : <a href="{{route('front.profile',['id'=>$comment->user->id, slug($comment->user->name)])}}">{{$comment->user->name}}</a>
                    </a>
                </div>
                <div class="col-md-4 text-right">

                    <i class="nc-icon nc-calendar-60"></i> : {{ $comment->created_at}}

                </div>

            </div>
        <br>
            {{$comment->comment}}
            @if(auth()->user())
                @if((auth()->user()->group ==' admin') ||(auth()->user()->id == $comment->user->id))
                @endif
                <a  href="" onclick="$(this).next('div').slideToggle(1000); return false;" class="btn btn-neutral btn-round  float-right">
                    edit
                </a>
                <div style="display: none">
                    <form  action="{{route('front.commentUpdate',['id'=>$comment->id])}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea  name="comment" class="form-control" id=""  rows="1">{{$comment->comment}}</textarea>
                        </div>
                        <button class="btn btn-danger btn-round" type="submit">Edit</button>
                    </form>
                </div>
            @endif
            @if(!$loop->last)
                <hr>
            @endif
        @endforeach

    </div>
</div>

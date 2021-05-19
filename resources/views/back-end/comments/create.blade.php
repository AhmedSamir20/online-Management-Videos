<form action="{{ route('comment.store') }}" method="post">
    {{ csrf_field() }}
{{--    @include('back-end.comments.form')--}}
    @php $input = "comment"; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Comment</label>
            <textarea name="{{ $input }}"  cols="30" rows="8" class="form-control @error($input) is-invalid @enderror">{{isset($users)? $users->{$input} :''}}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>


    <input type="hidden" value="{{ $users->id }}" name="video_id">
    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
    <div class="clearfix"></div>
</form>

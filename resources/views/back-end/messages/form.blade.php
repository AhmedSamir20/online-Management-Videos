<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($users) ? $users->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "email"; @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email</label>
            <input type="text" name="{{$input}}" value="{{ isset($users) ? $users->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "message"; @endphp
    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($users) ? $users->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
</div>

<hr>
<h3>Replay On Massage</h3>
<br>
<form action="{{route("message.replay",['id'=>$users->id])}}" method="post">
    {{csrf_field()}}
@php $input = "message"; @endphp
<div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Message</label>
        <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control @error($input) is-invalid @enderror"></textarea>
        @error($input)
        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
</div>

    <button type="submit" class="btn btn-primary pull-right">Replay Massage</button>
    <div class="clearfix"></div>
</form>

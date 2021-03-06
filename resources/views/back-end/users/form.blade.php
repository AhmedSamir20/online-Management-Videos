{{csrf_field()}}
<div class="row">
@php $input="name";  @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">name</label>
            <input type="text" name="{{$input}}" value="{{isset($users)? $users->{$input} :''}}" class="form-control  @error($input) is-invalid @enderror ">

            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php $input="email";  @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="{{$input}}" value="{{isset($users)? $users->{$input} :''}}" class="form-control  @error($input) is-invalid @enderror ">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @php $input="password";  @endphp
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="Password" name="{{$input}}" class="form-control  @error($input) is-invalid @enderror ">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


@php $input = "group"; @endphp
<div class="col-md-6">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">User Group</label>
        <select  name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            <option style="background-color: #0b3251" value="admin" {{ isset($users) && $users->{$input} == 'admin' ? 'selected'  :'' }}>admin</option>
            <option style="background-color: #0b3251" value="user" {{ isset($users) && $users->{$input} == 'user' ? 'selected'  :'' }}>user</option>
        </select>
        @error($input)
        <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
</div>
</div>

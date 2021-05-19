
<div id="profileCard" class="card card-nav-tabs" style="margin-top: 50px ; display: none">
    <h3 class="card-header card-header-info" style="font-weight: bolder">Update profile</h3>
    <div class="card-body">
        <form action="{{route('profile.update')}}" method="post" >
            <div class="row">
                {{ csrf_field() }}
                @php $input = "name"; @endphp
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name="{{ $input }}" value="{{ isset($user) ? $user->{$input} : '' }}"
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
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" name="{{$input}}" value="{{ isset($user) ? $user->{$input} : '' }}"
                               class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                @php $input = "password"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="{{ $input }}"
                               class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">

                    <button  type="submit" style="margin-top: 30px ;float: right" class="btn btn-danger btn-round">Update profile</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>

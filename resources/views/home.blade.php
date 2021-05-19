@extends('FrontEnd.layout.app')

@section('content')

<div class="section section-buttons">
    <div class="container">
        <div class="title">

            <h2> list OF videos</h2>

            @if(request()->has('search')&&request()->get('search') !== "")
                <p style="margin-top: 5px;">
                    <span style="font-weight: bolder">You Are Search On <span style="font-weight: bold">:</span> </span> <b style="font-weight: bold" >{{request()->get('search')}}</b> <a class="btn btn-link btn-danger" href="{{route('home')}}">Reset</a>
                </p>
            @endif
        </div>
        @include('FrontEnd.shared.video-row')
    </div>
</div>
@endsection

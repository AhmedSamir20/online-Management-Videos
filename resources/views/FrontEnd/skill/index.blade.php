@extends('FrontEnd.layout.app')

@section('content')

    <div class="section section-buttons">
        <div class="container">
            <div class="title">

                <h2> {{$skill->name}}</h2>
            </div>
           @include('FrontEnd.shared.video-row')
        </div>
    </div>
@endsection

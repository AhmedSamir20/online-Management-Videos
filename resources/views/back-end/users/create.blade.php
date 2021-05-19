@extends('back-end.layout.app')

@section('title')
    {{$pageTitle}}

@endsection

@section('content')

    @component('back-end.layout.header')

        @slot('nav_title')

            {{$pageTitle}}
        @endslot

    @endcomponent

    @component('back-end.shared.create',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])

        <form action="{{route($folderName.'.store')}}" method="post">

            @include('back-end.'.$folderName.'.form')

            <button type="submit" class="btn btn-primary pull-right">Add {{$moduleName}}</button>
            <div class="clearfix"></div>
        </form>

    @endcomponent
@endsection

@extends('FrontEnd.layout.app')

@section('title',$page->name)

@section('meta_des',$page->meta_des)
@section('meta_keywords',$page->meta_keywords)
@section('content')

<div class="section section-buttons">
    <div class="container text-center" style="min-height: 450px">
        <div class="title">

            <h2> {{$page->name}}</h2>
        </div>
       <p>{!! $page->des !!}</p>
    </div>
</div>
@endsection

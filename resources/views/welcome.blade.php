@extends('FrontEnd.layout.app')
@section('title','HomePage')
@section('content')

@include('FrontEnd.homePage-section.homeImage')
@include('FrontEnd.homePage-section.videos')
@include('FrontEnd.homePage-section.statics')
@include('FrontEnd.homePage-section.contact-us')

@endsection

@extends('back-end.layout.app')
    @section('title')
            home page
     @endsection

@push('css')

@endpush

@section('content')
{{--    @component('back-end.layout.header', ['nav_title' => "home page"])--}}

    @component('back-end.layout.header')

        @slot('nav_title')

            home page
        @endslot

    @endcomponent

@include('back-end.home-section.statics')
@include('back-end.home-section.latest-comments')
@endsection

@push('css')

{{--  <script>--}}
{{--      alert('welcome')--}}

{{--  </script>--}}

@endpush

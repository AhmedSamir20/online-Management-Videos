@extends('FrontEnd.layout.app')
@section('title',$video->name)
@section('meta_des',$video->meta_des)
@section('meta_keywords',$video->meta_keywords)
@section('content')

    <div class="section section-buttons">
        <div class="container">
            <div class="title">

                <h1> {{$video->name}}</h1>
            </div>


            <div class="row">
                @php $url = getYoutubeId($video->youtube) @endphp

                @if($url)
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}" style="margin-bottom: 20px" frameborder="0"  allowfullscreen></iframe>
                @endif

            </div>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-user-run"></i> : {{ $video->user->name }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-single-copy-04"></i> :
                              <a
                                  href="{{ route('front.category' , ['id' => $video->cat->id ]) }}">
                            {{ $video->cat->name }}
                        </a>
                        </span>
                    </p>
                    <p>
                        {{ $video->des }}
                    </p>
                </div>
                <div class="col-md-3">
                    <h6>Tags</h6>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{ route('front.tags' , ['id' => $tag->id]) }}">

                            <span class="badge badge-pill badge-success"> {{$tag->name}}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
                <div class="col-md-3">
                    <h6>Skills</h6>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                            <span class="badge badge-pill badge-danger"> {{ $skill->name}}</span>
                            <a>
                        @endforeach
                    </p>
                </div>

            </div>

            <div class="row py-lg-4">
                <div class="col-md-12">
                  @include('FrontEnd.video.comment')
                  @include('FrontEnd.video.create-comment')



                </div>
            </div>

        </div>

    </div>
@endsection



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

                @component('back-end.shared.edit',['pageTitle'=>$pageTitle , 'pageDes'=>$pageDes])

                    <form action="{{route($folderName.'.update',$users->id) }}"  method="post">
                        {{ method_field('put') }}
                        @include('back-end.'.$folderName.'.form')
                        <button type="submit" class="btn btn-primary pull-right">Update {{$moduleName}}</button>
                        <div class="clearfix"></div>
                    </form>

                @endcomponent


@endsection


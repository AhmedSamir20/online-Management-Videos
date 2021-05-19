@extends('back-end.layout.app')



@section('title')
    {{$pageTitle}}

@endsection

@section('content')
    {{--    @component('back-end.layout.header', ['nav_title' => "home page"])--}}

    @component('back-end.layout.header')

        @slot('nav_title')

           {{$pageTitle}}
        @endslot

    @endcomponent



    @component('back-end.shared.table',['pageTitle'=>$pageTitle,'pageDes'=>$pageDes])
        @slot('addButton')
            <div class="col-md-4 text-right">
                <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round">Add {{$sModuleName}}</a>
            </div>
        @endslot


        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    published
                </th>
                <th>
                    Category
                </th>
                <th>
                    User
                </th>
                <th class="text-right">
                    Control
                </th>

                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->id}}
                        </td>

                        <td>
                            {{$user->name}}
                        </td>
                        <td>

                            @if($user->published ==1)
                                published
                            @else

                                Hidden

                            @endif

                        </td>

                        <td>
                            {{ $user->cat->name }}
                        </td>
                        <td>
                            {{ $user->user->name }}
                        </td>


                        <td class="td-actions text-right">
                            @include('back-end.shared.buttons.edit')
                            @include('back-end.shared.buttons.delete')
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>


    @endcomponent

@endsection


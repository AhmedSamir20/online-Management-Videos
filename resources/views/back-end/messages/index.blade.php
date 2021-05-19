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
                   E-mail
                </th>

                <th class="text-right">
                    Control
                </th>

                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>

                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>




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


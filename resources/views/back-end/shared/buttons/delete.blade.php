<form action="{{route($routeName.'.destroy',$user->id)}}" method="post" enctype="multipart/form-data">
    {{method_field('delete')}}
    {{csrf_field()}}

    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$sModuleName}}">
        <i class="material-icons">close</i>
    </button>
</form>

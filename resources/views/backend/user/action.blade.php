@if(!empty($aclList[6][3]) || !empty($aclList[6][4]))
    <form method="post" action="{{ route('user.destroy',$id) }}">
        @if(!empty($aclList[6][3]))
            <a class="btn btn-xs btn-warning text-white" href="{{route('user.edit',$id)}}" title="Edit">
                <i class="fas fa-pencil-alt"></i>
            </a>
        @endif
        @if(!empty($aclList[6][4]))
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-xs btn-danger text-white delete" title="Delete">
                <i class="fas fa-trash-alt"></i>
            </button>
        @endif
    </form>
@endif

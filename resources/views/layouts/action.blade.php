@if(isset($showLink))
    <a class="btn btn-icon waves-effect btn-sm waves-light btn-info m-b-5" data-hover="tooltip" title="Edit" data-placement="top"
       href="{{ $showLink }}"> <i class="fa fa-search"></i>
    </a>
@endif

@if(isset($editLink))
    <a class="btn btn-icon waves-effect btn-sm waves-light btn-warning m-b-5" data-hover="tooltip" title="Edit" data-placement="top"
       href="{{ $editLink }}"> <i class="fa fa-pencil-alt"></i>
    </a>
@endif

@if(isset($deleteLink))
    <form method="POST" action="{{ $deleteLink }}"  onsubmit="return confirm('Anda yakin ingin menghapus data ini?');" style="display: inline">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="btn btn-icon waves-effect btn-sm waves-light btn-danger m-b-5" data-hover="tooltip" title="Hapus" data-placement="top"><i class="fa fa-trash"></i></button>
    </form>
@endif

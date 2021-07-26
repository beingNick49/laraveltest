<div class="actionButtons">
    <a href="{{ route($panel.'.edit',$id) }}"
       class="btn btn-sm btn-secondary mr-1"><i
            class="fa fa-pen"></i></a>

    <form action="{{ route($panel.'.destroy',$id) }}"
          method="post">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-sm btn-danger"><i
                class="fa fa-trash"></i></button>
    </form>
</div>

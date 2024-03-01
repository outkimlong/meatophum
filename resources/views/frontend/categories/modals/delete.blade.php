
<div class="modal fade" id="modal-delete{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('categories.destroy', $item->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('delete') }}
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('admin.delete_user')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>   
            <div class="modal-body">You sure you want to delete <b>{{$item->name}}</b>?</div>
            <div class="modal-footer">
                <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('admin.btn_cancel')}}</button>
                <button type="submit" class="btn btn-outline-danger">{{__('admin.btn_delete')}}</button>
            </div>
        </div>
        </form>
    </div>
</div> 

<div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ url('products/' .$item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">{{__('Update Category')}}</h5>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">{{__('Name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" >
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="active" class="col-sm-2 control-label">{{__('Active')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="active">
                                    <option value="0" {{ $item->active == 0 ? 'selected' : '' }}>{{__('admin.deactive')}}</option>
                                    <option value="1" {{ $item->active == 1 ? 'selected' : '' }}>{{__('admin.active')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">{{__('admin.btn_edit')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>


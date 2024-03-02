<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <form action="{{ url('products')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">{{__('Add Product')}}</h5>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="category_id" class="col-sm-2 control-label">{{__('Category')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">{{__('Name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">{{__('Price')}}</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price">
                                    <span class="input-group-addon">$</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="active" class="col-sm-2 control-label">{{__('Active')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="active">
                                    <option value="0">{{__('admin.deactive')}}</option>
                                    <option value="1">{{__('admin.active')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">{{__('Image')}}</label>
                            <div class="col-sm-10">
                                <input type="file" class="dropify" name="image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">{{__('admin.btn_save')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
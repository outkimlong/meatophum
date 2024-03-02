<div class="modal fade" id="modal-edit{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ url('products/' .$item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">{{__('Update Product')}}</h5>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="category_id" class="col-sm-2 control-label">{{__('Category')}}</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                  
                                        <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">{{__('Name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">{{__('Price')}}</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $item->price }}" name="price">
                                    <span class="input-group-addon">$</span>
                                </div>
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
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">{{__('Image')}}</label>
                            <div class="col-sm-10">
                                <input type="file" class="dropify" name="image" data-default-file="{{asset('storage/'.$item->image)}}"/>
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


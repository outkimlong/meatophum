<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <form action="{{ url('shops')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">{{__('Add Shop')}}</h5>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">{{__('Name')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">{{__('Phone')}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">{{__('Address')}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('address') is-invalid @enderror" rows="2" value="{{ old('address') }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark" class="col-sm-2 control-label">{{__('Remark')}}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('remark') is-invalid @enderror" rows="2" value="{{ old('remark') }}"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">{{__('Image')}}</label>
                            <div class="col-sm-10">
                                <input type="file" id="input-file-now" class="dropify" />
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">{{__('admin.btn_save')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
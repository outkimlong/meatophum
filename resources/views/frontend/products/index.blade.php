@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')

<section class="content-header">
    <h4>{{ __('admin.product') }}</h4>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('admin.home') }}</a></li>
        <li class="active">{{ __('admin.product') }}</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-create">
                        {{ __('Add New') }}
                    </a>
                </div>
                
                <div class="box-body">
                    <table class="display dataTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <div>
                                        <img src="{{asset('storage/'.$item->image)}}" alt="Shop Image" height="50px" width="50px">
                                    </div>
                                </td>

                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-center">
                                    @if($item->active)
                                    <span class="label-primary mr-1" style="border-radius: 50%; width: 8px; height: 8px; display: inline-block;"></span> {{__('admin.active')}}
                                    @else
                                    <span class="label-danger mr-1" style="border-radius: 50%; width: 8px; height: 8px; display: inline-block;"></span> {{__('admin.deactive')}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-social-icon btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit{{ $item->id }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-social-icon btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                                </td>
                                @include('frontend.products.modals.edit')
                                @include('frontend.products.modals.delete')
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.products.modals.create')
@endsection

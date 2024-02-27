@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <section class="content-header">
        <h4>{{ __('admin.user') }}</h4>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('admin.home') }}</a></li>
            <li class="active">{{ __('admin.user') }}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-create">
                            {{ __('admin.add_user') }}
                        </a>
                    </div>
                    <div class="box-body">
                        <table class="display dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="text-center">
                                            @if($item->verified)
                                                <span class="label-primary mr-1" style="border-radius: 50%;width: 8px;height: 8px; display: inline-block;"></span> {{__('admin.active')}}
                                            @else
                                                <span class="label-danger mr-1" style="border-radius: 50%;width: 8px;height: 8px; display: inline-block;"></span> {{__('admin.deactive')}}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-social-icon btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit{{ $item->id }}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-social-icon btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        @include('auth.users.modals.edit')
                                        @include('auth.users.modals.delete')
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('auth.users.modals.create')
    </section>
@endsection
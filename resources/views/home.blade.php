@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <section class="content-header">
        <h4>{{ __('admin.dashboard') }}</h4>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('admin.home') }}</a></li>
            <li class="active">{{ __('admin.dashboard') }}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
            
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>   
    </section>
@endsection

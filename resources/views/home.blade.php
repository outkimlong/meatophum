@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <section class="content-header">
        <h1>
            {{ __('messages.dashboard') }}
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
            <li class="active">{{ __('messages.dashboard') }}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('messages.dashboard') }}
                    </div>
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

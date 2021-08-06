@extends('backend.shared.master')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $panel }} Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $panel }} Manager</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($data['model'], ['route' => 'user.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    @csrf
                    @include('backend.user.includes.form')
                    <div class="text-center card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

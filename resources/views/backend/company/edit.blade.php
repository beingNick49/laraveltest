@extends('backend.common.master')
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
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route($base_route.'.index') }}">{{ $panel }}</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                    {!! Form::model($company, ['route' => [$base_route.'.update', $company->id], 'method' => 'PATCH','enctype'=>'multipart/form-data']) !!}
                    @csrf
                    @include($view_path.'.includes.form')
                    <div class="text-center card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

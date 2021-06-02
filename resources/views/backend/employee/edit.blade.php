@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Employee') }}</div>
                    <div class="card-body">
                        {!! Form::model($employee, ['route' => ['employee.update', $employee->id], 'method' => 'PATCH','enctype'=>'multipart/form-data']) !!}
                        @csrf
                        @include('backend.employee.includes.form')
                        <div class="text-center card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

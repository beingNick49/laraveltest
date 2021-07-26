@extends('backend.layouts.app')

@section('css')
    @include('shared.css_datatable')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('User') }}</div>

                    <div class="card-body">
                        {!! $dataTable->table(['class' => 'table table-hover']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('shared.js_datatable')
@endsection

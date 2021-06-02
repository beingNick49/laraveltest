@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <p><strong>{{ $data['users'] }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">{{ __('Companies') }}</div>

                    <div class="card-body">
                        <p><strong>{{ $data['companies'] }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">{{ __('Employees') }}</div>

                    <div class="card-body">
                        <p><strong>{{ $data['employees'] }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

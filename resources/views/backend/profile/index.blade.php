@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Profile Manager</h4>
            </div>
            <div class="card-body">
                <form method="post"
                      action={{ route('profile.update',auth()->user()->id) }} enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Name"
                               class="form-control">
                        @error('name')
                        <span class="error-messages" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ auth()->user()->email }}" placeholder="Email"
                               class="form-control" disabled>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

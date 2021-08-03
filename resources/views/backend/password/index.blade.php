@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Password Manager</h4>
            </div>
            <div class="card-body">
                <form method="post"
                      action={{ route('password.update',auth()->user()->id) }} enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password"
                               class="form-control">
                        @error('password')
                        <span class="error-messages" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Same password</label>
                        <input type="password" name="password_confirmation" placeholder="Same password"
                               class="form-control">
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

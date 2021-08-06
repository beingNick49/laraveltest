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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

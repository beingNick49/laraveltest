@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('User') }}</div>

                    <div class="card-body">
                        <div class="text-right mb-3">
                            <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                User</a>
                        </div>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data['users']->count() > 0)
                                @foreach($data['users'] as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('user.status',$user->id) }}">
                                                @if($user->status)
                                                    <button class="btn btn-sm btn-primary">ACTIVE</button>
                                                @else
                                                    <button class="btn btn-sm btn-warning">INACTIVE</button>
                                                @endif
                                            </a>
                                        </td>
                                        <td>
                                            <div class="actionButtons">
                                                <a href="{{ route('user.edit',$user->id) }}"
                                                   class="btn btn-sm btn-secondary mr-1"><i
                                                        class="fa fa-pen"></i></a>

                                                <form action="{{ route('user.destroy',$user->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><strong>No user available !!!</strong></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Employee') }}</div>

                    <div class="card-body">
                        <div class="text-right mb-3">
                            <a href="{{ route('employee.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Employee</a>
                        </div>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data['employees']->count() > 0)
                                @foreach($data['employees'] as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <div class="actionButtons">
                                                <a href="{{ route('employee.edit',$employee->id) }}"
                                                   class="btn btn-sm btn-secondary mr-1"><i
                                                        class="fa fa-pen"></i></a>

                                                <form action="{{ route('employee.destroy',$employee->id) }}"
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
                                    <td><strong>No employee available !!!</strong></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $data['employees']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

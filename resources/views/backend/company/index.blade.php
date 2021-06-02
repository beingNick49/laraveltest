@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Company') }}</div>

                    <div class="card-body">
                        <div class="text-right mb-3">
                            <a href="{{ route('company.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Company</a>
                        </div>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data['companies']->count() >0)
                                @foreach($data['companies'] as $company)
                                    <tr>
                                        <td>{{ $company->id }}</td>
                                        <td>
                                            @if(isset($company->logo))
                                                <img src="{{ asset('uploads/images/company/'.$company->logo) }}"
                                                     width="100">
                                            @else
                                                <p>N/A</p>
                                            @endif
                                        </td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>
                                            <div class="actionButtons">
                                                <a href="{{ route('company.edit',$company->id) }}"
                                                   class="btn btn-sm btn-secondary mr-1"><i class="fa fa-pen"></i></a>

                                                <form action="{{ route('company.destroy',$company->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><strong>No company available !!!</strong></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {{ $data['companies']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

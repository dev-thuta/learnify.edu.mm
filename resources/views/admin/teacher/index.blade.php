@extends('layouts.app')

@section('content')
<div class="container">
    @if(@session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Teacher List') }}
                <a href="{{ url('/admin/teachers/add') }}" class="btn btn-success float-end"><i class="fa-solid fa-plus me-1"></i>Create</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped rounded">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Name</th>
                                    <th>Profile</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = ($teachers instanceof \Illuminate\Pagination\LengthAwarePaginator) ? $teachers->firstItem() : 1; @endphp
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <a href="{{ url("/admin/teachers/edit/$teacher->id") }}" class="btn btn-primary mb-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger mb-1" href="{{ url("/admin/teachers/delete/$teacher->id") }}"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                        <td>{{ $teacher['name'] }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $teacher->profile) }}" alt="{{ $teacher->name }}" style="max-width:100px;
                                            max-height:100px;">
                                        </td>
                                        <td>{{ $teacher['phone'] }}</td>
                                        <td>{{ $teacher['email'] }}</td>
                                        <td>{{ $teacher['created_at']->format('Y-m-d') }}</td>
                                        <td>{{ $teacher->updated_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center align-items-center">
                    {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

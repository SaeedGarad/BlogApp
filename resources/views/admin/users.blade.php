@extends('Layouts')

@section('title')
    Users
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Users</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Admin?</th>
                        <th scope="col">Post Count</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_admin ? "Yes" : "No" }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>
                                <form action="/admin/users/{{$user->id}}" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="next">
                <div class="btn-toolbar justify-content-center" role="toolbar">
                    <div class="btn-group" role="group" aria-label="First group">
                        <div class="d-felx justify-content-center mt-5">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

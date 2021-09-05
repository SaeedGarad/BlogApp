@extends('Layout')
@section('content')

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Categories

                            <a href="/admin/categories/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Post Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{$category->posts->count()}}</td>
                                    <td>
                                        <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form style="display:inline;" action="/admin/categories/{{ $category->id }}" method="post">
                                            @csrf
                                        @method('delete')
                                        <button  type="submit" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="text-center">
                            {{$categories->render()}}
                        </div>

                    </div>
                </div>
            </div>

        </div>

@endsection


@extends('Layout')
@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Comments

                            <a href="/admin/comments/create" class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Post</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment )
                                <tr>
                                    <td>{{ $comment->post->title }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                        <form style="display:inline;" action="/admin/comments/{{$comment->id}}" method="post">
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
                            {{$comments->render()}}
                        </div>


                    </div>
                </div>
            </div>

        </div>
@endsection

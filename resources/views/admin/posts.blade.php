@extends('Layout')
@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Posts

                            <a href=/admin/posts/create " class="btn btn-default pull-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('post_trans.title') }}</th>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)

                                <tr>
                                    <td> {{ $post->title }} </td>
                                    <td> {{ $post->body }} </td>
                                    <td> {{ $post->author }} </td>
                                    <th> {{ $post->category->name }}</th>

                                    <td>
                                        @foreach ($post->tags as $item)
                                           {{ $item->name }}
                                           <br>
                                        @endforeach
                                    </td>
                                    <td> {{ $post->published == 1 ? 'Yes' : 'No' }} </td>


                                    <td>
                                        <a href="/admin/posts/publish/{{$post->id}}" class="btn btn-xs btn-{{$post->published == 1 ? 'warning' : 'info'}}">{{ $post->published == 1 ? 'UnPublished' : 'Published' }}</a>
                                        <a href="/admin/posts/{{ $post->id }} " class="btn btn-xs btn-success">Show</a>
                                        <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-xs btn-info">Edit</a>
                                        <form style="display:inline;" action="/admin/posts/{{$post->id}}" method="post">
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
                            {{$posts->render()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

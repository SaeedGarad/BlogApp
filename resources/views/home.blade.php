@extends('Layout')

@section('content')


        <div class="row form-search">
            <form method="GET" action="" accept-charset="UTF-8" role="form">
                <div class="col-md-10">
                    <input class="form-control" placeholder="Search..." name="search" type="text">
                </div>
                <div class="col-md-2">
                    <input class="btn btn-block btn-default" type="submit" value="Sumbit">
                </div>
            </form>
        </div>

        <div class="row">

            <div class="col-md-12">
                    <div class="panel panel-default">

                        @foreach ($posts as $post)
                        <div class="panel-heading">
                            {{ $post->title }} <small>by Prof. {{ $post->author }}</small>

                            <span class="pull-right">
                                Thu, Jan 10, 2019 7:50 AM
                            </span>
                        </div>

                        <div class="panel-body">
                            <p> {{ $post->body }} </p>
                            <p>
                                Tags:
                                @foreach ($post->tags as $item)
                                    <span class="label label-danger">{{ $item->name }}.</span>
                                @endforeach

                            </p>
                            <p>
                                <span class="btn btn-sm btn-success">ipsum</span>
                                <span class="btn btn-sm btn-info">Comments <span class="badge"></span></span>

                                <a href="/post/{{ $post->id }}" class="btn btn-sm btn-primary">See more</a>
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <div class="text-center">
                        {{$posts->links()}}
                     </div>
            </div>
        </div>

@endsection

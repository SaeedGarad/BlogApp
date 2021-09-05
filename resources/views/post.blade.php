<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Blog</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

</head>

<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Laravel Blog
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="">Login</a></li>
                    <li><a href="">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $posts->title }} <small>by Prof. {{ $posts->author }}</small>

                        <span class="pull-right">
                            Thu, Jan 10, 2019 7:50 AM
                        </span>
                    </div>

                    <div class="panel-body">
                        <p>{{ $posts->body }}</p>
                        <p>
                            Category: <span class="label label-success">ipsum</span> <br>
                            Tags:

                            @foreach ($posts->tags as $item)
                                <span class="label label-danger">{{  $item->name }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>



                    @foreach ($posts -> comments as $comment)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lacey Gaylord DVM says...

                                <span class="pull-right">{{$comment->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="panel-body">
                                <p>  {{$comment->comment}}  </p>
                            </div>
                        </div>
                    @endforeach
            </div>



        </div>

        {{--  <div class="form-group">
            <label for="body" class="col-md-2 control-label"
              >Body</label
            >

            <div class="col-md-8">
              <textarea
                class="form-control"
                required="required"
                name="body"
                cols="50"
                rows="10"
                id="body"
              ></textarea>

              <span class="help-block">
                <strong></strong>
              </span>
            </div>
          </div>  --}}


          <div class="row mt-2 p-3" style="border-top: 1px dashed #bbb">
            <form action="/post/{{ $posts->id }}" method="POST">
                @csrf
                <div class="input-group">
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                         <textarea class="form-control"
                          rows="4"
                          cols="100"
                          name="comment"
                          id="comment"
                          >{{ old('comment') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Comment</button>
            </form>
        </div>



    </div>
</body>

</html>

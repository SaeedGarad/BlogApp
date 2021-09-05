@extends('Layout')
@section('content')
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Edit Post

                  <a href="/admin/posts" class="btn btn-default pull-right"> Go Back </a>
                </h2>
              </div>

              <div class="panel-body">
                <form
                  method="POST"
                  action="/admin/posts/{{ $post->id }}"
                  accept-charset="UTF-8"
                  class="form-horizontal"
                  role="form"
                >
                 @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title" class="col-md-2 control-label"
                      >Title</label
                    >

                    <div class="col-md-8">
                      <input
                        class="form-control"
                        {{--  required="required"  --}}
                        autofocus="autofocus"
                        name="title"
                        type="text"
                        value="{{$post->title}}"
                        id="title"
                      />

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="author" class="col-md-2 control-label"
                      >Author</label
                    >

                    <div class="col-md-8">
                      <input
                        class="form-control"
                        {{--  required="required"  --}}
                        autofocus="autofocus"
                        name="author"
                        type="text"
                        id="author"
                        value="{{$post->author}}"
                      />

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="body" class="col-md-2 control-label"
                      >Body</label
                    >

                    <div class="col-md-8">
                      <textarea
                        class="form-control"
                        {{--  required="required"  --}}
                        name="body"
                        cols="50"
                        rows="10"
                        id="body"
                      >{{$post->body}}</textarea>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="tag_id" class="col-md-2 control-label"
                      >Tag</label
                    >

                    <div class="col-md-8">
                      <select
                        class="form-control"
                        required="required"
                        id="tag_id"
                        name="tag_id[]"
                        multiple
                        >

                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"

                            @foreach ($post->tags as $tagp)
                            {{$tagp->id == $tag->id ? 'selected' : ''}}
                            @endforeach


                        >{{$tag->name}}</option>
                        @endforeach

                        </select>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div


                  <div class="form-group">
                    <label for="category_id" class="col-md-2 control-label"
                      >Category</label
                    >

                    <div class="col-md-8">
                      <select
                        class="form-control"
                        required="required"
                        id="category_id"
                        name="category_id"
                        >
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach

                        </select>

                      <span class="help-block">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                      <button type="submit" class="btn btn-primary">
                        Update
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endsection

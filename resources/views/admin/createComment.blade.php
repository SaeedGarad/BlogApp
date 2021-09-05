@extends('Layout')
@section('content')

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  Create comment

                  <a href="/admin/comments" class="btn btn-default pull-right">Go Back</a>
                </h2>
              </div>

              <div class="panel-body">
                <form
                  method="POST"
                  action="/admin/comments"
                  accept-charset="UTF-8"
                  class="form-horizontal"
                  role="form"
                >
                @csrf
                  <div class="form-group">
                    <label for="title" class="col-md-2 control-label"
                      >Comment</label
                    >

                    <div class="col-md-8  {{$errors->first('comment') ? 'has-error' : ''}} ">
                      <input
                        class="form-control"
                        {{--  required="required"  --}}
                        autofocus="autofocus"
                        name="comment"
                        type="text"
                        id="comment"
                      />

                      <div class=" text-danger " >
                        {{ $errors->first('comment') }}
                      </div>


                      <span class="help-block">
                        <strong></strong>
                      </span>
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


                  <div class="form-group">
                    <label for="post_id" class="col-md-2 control-label"
                      >Post</label
                    >

                    <div class="col-md-8">
                      <select
                        class="form-control"
                        required="required"
                        id="post_id"
                        name="post_id"
                        >

                        @foreach ($posts as $post)

                        <option value="{{ $post->id }}">  {{ $post->title }}  </option>

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
                        Create
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

@endsection

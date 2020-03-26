@extends('layout')
@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading is-size-4">New Article</h1>


            <form method="POST" action="/articles">
                @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input type="text"
                        name="title" i
                        d="title"
                        class="input @error('title') is-danger @enderror"
                        value="{{ old('title') }}">

                        @error('title')
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea
                        name="excerpt"
                        id="excerpt" cols="30" rows="10"
                        class="textarea @error('excerpt') is-danger @enderror">
                            {{ old('excerpt') }}
                        </textarea>

                        @error('excerpt')
                            <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea
                        name="body" id="body"
                        cols="30" rows="10"
                        class="textarea @error('body') is-danger @enderror">
                            {{ old('body')}}
                        </textarea>

                        @error('body')
                            <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Tags</label>

                    <div class="control select is-multiple">
                        <select name="tags[]"
                        id=""
                        multiple>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        @error('body')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="is-link button">Submit</button>
                    </div>
                    <div class="control">
                        <button class="is-text button">Cancel</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

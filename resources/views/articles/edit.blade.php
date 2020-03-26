@extends('layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading is-size-4">Update Article</h1>

            <form method="POST" action="/articles/{{$article->id}}">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input type="text" name="title" id="title" class="input" value="{{$article->title}}">
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="textarea">{{$article->excerpt}}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea name="body" id="body" cols="30" rows="10" class="textarea">{{$article->body}}</textarea>
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

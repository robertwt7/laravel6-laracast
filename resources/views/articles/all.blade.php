@extends('layout')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>These are all our articles</h2>
                <span class="byline">Mauris vulputate dolor sit amet nibh</span>
            </div>
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            @forelse ($articles as $article)
                <h2>
                    <a href="{{$article->path()}}"> {{$article->title}}</a>
                </h2>

            @empty
                <p>No relevant articles yet!</p>
            @endforelse
        </div>
    </div>
</div>
@endsection

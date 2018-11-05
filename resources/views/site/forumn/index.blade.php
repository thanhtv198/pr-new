@extends('site/layouts/master')
@section('content')
    @include('site.notice')
    <div view="detail">
        <h3 class="tittle-w3l">
            {{ trans('common.product_detail.head') }}
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div class="container">
            @foreach( $posts as $post)
            <div class="row">
                <h2>
                    <a href="{{ route('posts.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                </h2>
                <p>{!! $post->content !!}</p>
            </div>
            <div class="clearfix"></div>
            @endforeach
        </div>
    </div>
@endsection

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
            <div class="row">
               
                    <div class="col-md-9">
                        @foreach( $posts as $post)
                            <h2>
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p>{!! $post->content !!}</p>
                        @endforeach
                    </div>
                    <div class="side-bar col-md-3" id="thanh-side-bar">
                        <ul class="nav sidebar-categories margin-bottom-40">
                            @foreach($topics as $row)
                                <li>
                                    @if(isset($topicSidebar) && $topicSidebar == $row->id)
                                        <a href="{{ route('posts',  ['slug' => $row->slug]) }}" class="title-topic-choose">
                                            {{ $row->name }} ({{ count($row->posts) }})
                                        </a>
                                    @else
                                        <a href="{{ route('posts',  ['slug' => $row->slug]) }}">{{ $row->name }} ({{ count($row->posts) }})</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
        </div>
        <div class="clearfix"></div>
        </div>
    </div>
@endsection

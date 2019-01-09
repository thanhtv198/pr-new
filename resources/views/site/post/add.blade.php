@extends('site/layouts/master')
@section('content')
    <style>
        .add-post{
            min-height: 700px;
        }
    </style>
    <section class="content-header">

    </section>
    <!-- Main content -->
        <h3 class="tittle-w3l">
            {{ trans('common.tag.head_add_post') }}
            <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
        </h3>
    <div class="container">
        <div class="" style="width: 90%; margin-left: 5%">
            @include('site/notice')
            {!! Form::open(['route' => ['posts.store'] , 'method' => 'POST', 'files' => true]) !!}
            <div>
                <h2>{{ trans('common.tag.title_add_post') }}</h2>
                <br>
                {{ trans('common.tag.topic') }}
                {!! Form::select('topic', $topics, null, ['class' => 'form-control', 'placeholder' => trans('common.tag.topic')]) !!}
                <br>
                {{ trans('common.tag.title') }}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('common.tag.title')]) !!}
                <br>
            </div>
            <br>
            <div id="ckeditor-content">
                {{ trans('common.tag.content_post') }}
                {!! Form::textarea('content', null, ['class' => 'add-post ckeditor', 'id' => 'editor-post']) !!}
            </div>
            <br>
            <div class="clearfix"></div>
            {!! Form::submit(trans('common.button.save'), ['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
            <hr>
        </div>
        </div>
    <div class="clearfix"></div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--CKEDITOR.replace( 'content' );--}}
    {{--});--}}
{{--</script>--}}

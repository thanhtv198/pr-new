@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
        <h3 class="tittle-w3l">
            {{ trans('common.post.edit') }}
            <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
        </h3>
    <div class="container">
        <div class="" style="width: 90%; margin-left: 5%">
            {!! Form::open(['route' => ['posts.store'] , 'method' => 'POST', 'files' => true]) !!}
            <div>
                <h2>Write your new post </h2>
                Content
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('en.form.title')]) !!}
                Toppic
                {!! Form::text('toppic', null, ['class' => 'form-control', 'placeholder' => trans('en.form.title')]) !!}
                <br>
                <div class="form-group">
                    <label>{{ trans('common.form.role') }}</label>
                    {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'id' => 'tag', 'multiple' => true]) !!}
                </div>
            </div>
            <br>
            <div id="ckeditor-content">
                {!! Form::textarea('content', null, ['class' => 'ckeditor', 'id' => 'editor-post']) !!}
            </div>
            {!! Form::submit(trans('en.button.save'), ['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}

            <hr>
        </div>
        </div>
    <div class="clearfix"></div>

    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--CKEDITOR.replace( 'description' );--}}
        {{--});--}}
    {{--</script>--}}

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>--}}

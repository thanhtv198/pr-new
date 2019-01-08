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
        <div class="ads-grid">
        <div class="container">
        <div class="post" view="post">
            {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal', 'files' => true]) !!}
            <fieldset>
                <!-- Form Name -->
                <h2 class="tittle">{{ trans('common.post.info') }}</h2>
                <hr>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="post_name">{{ trans('common.post.title') }}</label>
                    <div class="col-md-9">
                        {!! Form::text('title', $post->title, ['class' => 'form-control input-md', 'placeholder' => trans('common.post.title') ])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="post_categorie">{{ trans('common.post.topic') }}</label>
                    <div class="col-md-9">
                        {!! Form::select('topic_id', $topic, null, ['class' => 'form-control select2 select2-hidden-accessible']) !!}
                    </div>
                </div>
        
                <div class="form-group">
                    <label class="col-md-3 control-label" for="post_description">{{ trans('common.post.content') }}</label>
                    <div class="col-md-9">
                        {!! Form::textarea('content', $post->content, ['class' => 'form-control input-md', 'placeholder' => trans('common.post.content')]) !!}
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="singlebutton"></label>
                    <div class="col-md-3">
                        {!! Form::button(trans('common.button.save'), ['type' => 'submit', 'class' => 'submit-info']) !!}
                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace( 'description' );
        });
    </script>
@endsection


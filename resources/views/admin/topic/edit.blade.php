@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.topic_head') }}</h1>
    </section>
    <div class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('common.title_form.topic_title') }}</h3>
                @include('admin.notice')
            </div>
            {!! Form::open(['route' => ['admin.topics.update', $topic->id], 'method' => 'put', 'class' => 'form-signin']) !!}
            <div class="row">
                <div class="col-md-6">
                    <!-- iCheck -->
                    <div class="box box-info">
                        <div class="box-body">
                            <!-- Color Picker -->
                            <div class="form-group">
                                <label>{{ trans('common.form.name') }}</label>
                                {!! Form::text('name', $topic->name, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                            <div class="form-group">
                                <label>{{ trans('common.form.slug') }}</label>
                                {!! Form::text('slug', $topic->slug, ['class' => 'form-control my-colorpicker1 colorpicker-element']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add">
                {{ Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) }}
            </div>
            <!-- /.row -->
            {!! Form::close() !!}
        </div>
    </div>
    </section>
@endsection


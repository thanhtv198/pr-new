@extends('admin/layouts/master')
@section('content')
    <section class="content-header">
        <h1>{{ trans('common.title_form.post_head') }}</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('admin/notice')
                        <div class="pull-left">
                            <div class="card-header">
                                <h3 class="card-title">{{ trans('common.title_form.post_title') }}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="width: 98%; margin-left: 1%">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>{{ trans('en.form.name') }}</th>
                                <th>{{ trans('en.form.title') }}</th>
                                <th>{{ trans('en.form.content') }}</th>
                                <th>{{ trans('en.form.view') }}</th>
                                <th>{{ trans('en.form.status') }}</th>
                                <th>{{ trans('en.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr id="row-{{ $post->id }}">
                                    <td>{{ $post->user->name}}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <div view="post-user-detail">
                                            <p class="more">
                                                {!! $post->content !!}
                                            </p>
                                        </div>
                                    </td>
                                    <td>{{ $post->view }}</td>
                                    <td>
                                        @if ($post->status == 1)
                                            <span class="right badge badge-success badge-status active-{{ $post->id }}">
                                                 {{ trans('en.form.activating') }}
                                            </span>
                                            <br>
                                            <hr>
                                            <i class="reject-{{ $post->id }}" id="status-reject-now">
                                                <p class="show_input reject-font" id="reason{{ $post->id }}">
                                                    <span class="right badge badge-danger badge-status">
                                                        {{ trans('en.form.block_now') }}
                                                    </span>
                                                </p>
                                            </i>
                                            <div id="show{{ $post->id }}" class="hidd" style="display: none; ">
                                                {!! Form::text('reason', null, ['id' => "rea$post->id"]) !!}
{{--                                                {!! Form::hidden('url', config('blog.base_url'), ['id'=> 'url']) !!}--}}
                                                <span href="javascript:void(0)" data-url="{{ route('admin.posts.inactive', $post->id) }}"
                                                        class="reject-font send" id="re{{ $post->id }}">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        @else
                                            <p class="show_input reject-font" id="reject-{{ $post->id }}">
                                                <span class="right badge badge-danger badge-status">
                                                     {{ trans('en.form.rejected') }}
                                                </span><br>
                                                <span id="reason">{{ $post->block->reason }}</span>
                                            <hr>
                                            </p>
                                            <br>
                                            <p>
                                                <span class="right badge badge-success reject-font badge-status active-now"
                                                      id="active-now-{{ $post->id }}"
                                                      data-url="{{ route('admin.posts.active', $post->id) }}">
                                                    Active Now
                                                </span>
                                            </p>
                                        @endif
                                        <div id="text-show{{ $post->id }}" class="text-reason">
                                        </div>
                                    </td>
                                    <td>
                                        <p class="del-button" id="{{ $post->id }}" data-url="{{ route('admin.posts.destroy', $post->id) }}">
                                            <button type="button" class="btn btn-block btn-outline-danger btn-sm">Delete</button>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection


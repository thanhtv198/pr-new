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
            <div class="col-md-12 col-sm-12">
                <div class="col-md-9">
                    @if(Auth::check() && $post->user->id == auth()->user()->id)
                        <div class="pull-right">
                            <li class="edit-in-detail">
                                <a href="{{ route('posts.edit', $post->id) }}">
                                    <i class="nav-icon fa fa-pencil"></i>
                                    {{ trans('en.button.edit') }}
                                </a>
                            </li>
                        </div>
                    @endif
                </div>
                <div class="content-page">
                    <div class="row">
                        <!-- BEGIN LEFT SIDEBAR -->
                        <div class="col-md-9 col-sm-9 blog-item">
                            <h2><p>{{ $post->title }}</p></h2>
                            <ul class="blog-info">
                                <li><i class="fa fa-user"></i>By admin</li>
                                <li><i class="fa fa-calendar"></i>{{ $post->created_at }}</li>
                                <li><i class="fa fa-eye"></i>{{ $post->view }}</li>
                                <li>
                                    {{--@foreach($post->tags_name as $tag)--}}
                                        {{--<a href="javascript:;">--}}
                                            {{--<i class="fa fa-tags"></i>--}}
                                            {{--{{ $tag[0]['name'] }}--}}
                                        {{--</a>--}}
                                    {{--@endforeach--}}
                                </li>
                            </ul>

                            <p>{!! $post->content !!}</p>
                            <div class="post-comment padding-top-40">
                                <h3>{{ trans('en.tag.leave_comment') }}</h3>
                                <div class="form-group">
                                    <label>{{ trans('en.tag.message') }}</label>
                                    <textarea class="form-control" name="content_parent_comment" rows="8"></textarea>
                                </div>
                                <p>
                                    <button class="btn btn-primary parent-comment" data-url="{{ url('posts/'.$post->id.'/comments') }}">
                                        {{ trans('en.button.comment') }}
                                    </button>
                                </p>
                            </div>
                            <h2>{{ trans('en.tag.comments') }}</h2>
                            <div class="comments">
                                @if(Auth::check())
                                    {!! Form::hidden('username', auth()->user()->name) !!}
                                @endif
                                @foreach ($comments as $comment)
                                    @if($comment->parent_id == null)
                                        <div class="media comment-parent">
                                            <a href="javascript:;" class="pull-left">
                                                <img src="" alt="" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    @if(Auth::user()->avatar)
                                                        <img src="{{ url(config('model.user.upload')) }}/{{ Auth::user()->avatar }}"
                                                             width="37px" style="border-radius: 50%; border:1px solid #2196f3">
                                                    @endif
                                                    <strong>
                                                        {{ $comment->user->name }}
                                                    </strong>
                                                    <span>
                                                            {{ $comment->created_at }} /
                                                            <a class="reply-parent" id="{{ $comment->id }}">
                                                                {{ trans('en.button.reply') }}
                                                            </a>
                                                        </span>
                                                </h4>
                                                <p class="content-cmt">{{ $comment->content }}</p>
                                                <div class="input-group input-{{ $comment->id }}" style="display: none">
                                                    <input type="text" class="form-control content-reply" id="comment-{{ $comment->id }}"
                                                           name="content-reply">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-success reply-button" id="rep{{ $comment->id }}"
                                                                    data-url="{{ url('posts/'.$post->id.'/replies') }}">
                                                                {{ trans('en.button.reply') }}
                                                            </button>
                                                        </span>
                                                </div>
                                                <div id="replies-box" class="comment-replies-{{ $comment->id }}">
                                                    <!-- Nested media object -->
                                                    @foreach ($comment->replies as $row)
                                                        <div class="media">
                                                            <a href="javascript:;" class="pull-left">
                                                                <img src="" alt="" class="media-object">
                                                            </a>
                                                            <div class="media-body">
                                                                <h4 class="media-heading">
                                                                    @if(Auth::user()->avatar)
                                                                        <img src="{{ url(config('model.user.upload')) }}/{{ Auth::user()->avatar }}"
                                                                             width="37px" style="border-radius: 50%; border:1px solid #2196f3">
                                                                    @endif
                                                                    <strong>{{ $row->user->name }}</strong>
                                                                    <span>{{ $row->created_at }}</span>
                                                                </h4>
                                                                <p class="content-cmt">{{ $row->content }}</p>
                                                            </div>
                                                        </div>
                                                        <!--end media-->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <br><br>
                            <hr>
                            <h2 class="text-left">{{ trans('en.tag.comment_by_facebook') }}</h2>
                            <div class="comment">
                                <div class="media">
                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END LEFT SIDEBAR -->
                        <!-- BEGIN RIGHT SIDEBAR -->
                    {{--@include('frontend/layouts/sidebar')--}}
                    <!-- END RIGHT SIDEBAR -->
                    </div>
                </div>
            </div>
        <div class="clearfix"></div>
    </div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    //comment post
    $(document).ready(
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', ".parent-comment", function (e) {

                let content = $('textarea[name="content_parent_comment"]').val();
                let href = $(this).attr('data-url');
                let name = $("input[name='username']").val();;
                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {content: content},
                    dataType: "json",
                    success: function (data) {
                        let id = data.comment.id;
                        console.log(data);
                        let url = 'http://localhost:8000/posts/' + id + '/replies';
                        let comment = '                 <div class="media comment-parent">\n' +
                            '                                                   <a href="javascript:;" class="pull-left">\n' +
                            '                                                       <img src="" alt="" class="media-object">\n' +
                            '                                                   </a>\n' +
                            '                                                   <div class="media-body">\n' +
                            '                                                    <h4 class="media-heading">' +
                            '<img src="'+ data.base_url + '/' + data.avatar +'" ' +
                            'width="37px" style="border-radius: 50%; border:1px solid #2196f3">\n' +
                            '                                                        <strong>' + name + '</strong>\n' +
                            '                                                         <input type="hidden" name="username" value="' + name + '">\n' +
                            '                                                        <span>' + data.time + '/ <a class="reply-parent" id="' + id + '">Reply</a></span>\n' +
                            '                                                    </h4>\n' +
                            '                                                    <p class="content-cmt">' + data.comment.content + '</p>\n' +
                            '                                                    <div class="input-group input-' + id + '" style="display: none">\n' +
                            '                                                         <input type="text" size="50" class="form-control content-reply" id="comment-' + id + '" name="content-reply">\n' +
                            '                                                         <span class="input-group-btn">\n' +
                            '                                                           <button class="btn btn-success reply-button" id="rep' + id + '" data-url="' + url + '">Reply\n' +
                            '                                                           </button>\n' +
                            '                                                         </span>\n' +
                            '                                                    </div>\n' +
                            '                                                    <div id="replies-box" class="comment-replies-' + id + '">\n' +
                            '                                                    </div>\n' +
                            '                                                </div>\n' +
                            '                                            </div>'
                        $('.comments').append(comment);
                    }

                });
            });
        });

    $(document).ready(
        function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.reply-parent', function (e) {
                let id = $(this).attr('id');
                $('.input-' + id).toggle();
            });

            $(document).on('click', '.reply-button', function (e) {
                let href = $(this).attr('data-url');
                let parent_id = $(this).attr('id').substring(3);
                let content = $('#comment-' + parent_id).val();

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {repContent: content, parent_id: parent_id},
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        let reply = '<div class="media">\n' +
                            '            <a href="javascript:;" class="pull-left">\n' +
                            '                 <img src="" alt="" class="media-object">\n' +
                            '            </a>\n' +
                            '            <div class="media-body">\n' +
                            '                <h4 class="media-heading">\n' +
                            '<img src="'+ data.base_url + '/' + data.avatar +'" ' +
                            'width="37px" style="border-radius: 50%; border:1px solid #2196f3">\n' +
                            '                     <strong>' + data.name + '</strong>\n' +
                            '                     <span>' + data.time + '</span></h4>\n' +
                            '                   <p class="content-cmt">' + content + '</p>\n' +
                            '            </div>\n' +
                            '        </div>'

                        $('.comment-replies-' + parent_id).append(reply);
                        $('.input-' + parent_id).css('display', 'none');
                    }
                });
            });
        });


</script>
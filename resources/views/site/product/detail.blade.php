@extends('site/layouts/master')
@section('content')
    <style>
        .rating {
            width: 200px;

        }
    </style>
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
                <div class="pull-left col-md-6">
                    <div class="image-top">
                        <img src="{{ url(config('app.productUrl')) }}/{{ $product->id }}/{{ $images[0]['image'] }}" width="410px" height="460">
                    </div>
                    <div class="image-bot d-flex justify-content-center">
                        @foreach ($images->take(4) as $item)
                            <div class="image-bot-container border">
                                <img src="{{ url(config('app.productUrl')) }}/{{ $product->id }}/{{ $item->image }}" width="100px" height="115px">
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                    <div class="seller_info">
                        <h2>{{ trans('common.product.seller_info') }}</h2>
                        <br>
                        @if(Auth::check() && Auth::user()->id != $product->user_id)
                        <div style="text-align: left;">
                            <span>{{ trans('common.product_detail.send_message') }}</span>
                            <a href="{{ route('send_message', $product->user->id) }}">
                                <i class="fa fa-comments message"></i>
                            </a>
                        </div>
                        @endif

                        <table class="table table-hover">
                            <thead>
                            <thead>
                            <tr>
                                <th class="th1">{{ trans('common.product_detail.info') }}</th>
                                <th>{{ trans('common.product_detail.detail') }}</th>
                            </tr>
                            </thead>
                            <tr>
                                <th class="th1"><b>{{ trans('common.form.name') }}</b></th>
                                <th> {{ $product->user->name }}</th>
                            </tr>
                            <tr>
                                <th class="th1"><b>{{ trans('common.form.email') }}</b></th>
                                <th>{{ $product->user->email }}</th>
                            </tr>
                            <tr>
                                <th class="th1"><b>{{ trans('common.form.phone_number') }}</b></th>
                                <th>{{ $product->user->phone_number }}</th>
                            </tr>
                            <tr>
                                <th class="th1"><b>{{ trans('common.form.address') }}</b></th>
                                <th>{{ $product->user->address . ' , ' . $product->user->city->name }}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="pull-right col-md-6">
                    <h1>{{ $product->name }} </h1>
                    <div>
                        <input id="input-5" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                               data-step="0.5" value="{{ $product->averageRating }}" data-size="xs">
                    </div>
                    <div class="info-product-price">
                        @php $price_new = $product->price - $product->promotion @endphp
                        @if ($product->promotion > 0)
                            <span class="item_price">{{ number_format($price_new) }}đ</span>
                            <del>{{ number_format($product->price) }}đ</del>
                        @else
                            <span class="item_price">
                            {{ number_format($price_new) }}đ
                        </span>
                        @endif
                    </div>
                    <p>
                        <b>{{ trans('common.product_detail.views') }}</b>
                        {{ $product->views }}
                    </p>
                    <p>
                        <b>{{ trans('common.product_detail.manufacture') }}</b>
                        {{$product->manufacture['name']}}
                    </p>
                    <p>
                        <b>{{ trans('common.product_detail.category') }}</b>
                        {{$product->category['name']}}
                    </p>
                    <p>
                        <b>{{ trans('common.product_detail.date_manufacture') }}</b>
                        {{$product->date_manufacture}}
                    </p>
                    <hr>
                    <h2>{{ trans('common.product_detail.detail_head') }}</h2>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <thead>
                        <tr>
                            <th class="th1">{{ trans('common.product_detail.info') }}</th>
                            <th>{{ trans('common.product_detail.detail') }}</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>{{ trans('common.product.screen') }}</td>
                            <td>{{ $product->screen }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.os') }}</td>
                            <td>{{ $product->os }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.front_camera') }}</td>
                            <td>{{ $product->front_camera }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.back_camera') }}</td>
                            <td>{{ $product->back_camera }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.cpu') }}</td>
                            <td>{{ $product->cpu }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.ram') }}</td>
                            <td>{{ $product->ram }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.memory') }}</td>
                            <td>{{ $product->memory }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.sim') }}</td>
                            <td>{{ $product->sim }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.battery') }}</td>
                            <td>{{ $product->battery }}</td>
                        </tr>
                        @if(isset($product->customizeProducts))
                            @foreach($product->customizeProducts as $p)
                                <tr>
                                    <td>{{ json_decode($p->property) }}</td>
                                    <td>{{ $p->detail }}</td>
                                </tr>
                            @endforeach
                        @endif
                        <thead>
                    </table>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out thanh-detail">
                        <div class="product-icon-container thanh-product-detail">
                            <a href="{{ route('add_cart', $product->id) }}" onclick="addToCart()">
                                {{ Form::submit(trans('common.button.add_cart'), ['class' => 'button']) }}
                            </a>
                        </div>
                        @if(Auth::check())
                        <div class="product-add-wishlist thanh-product-detail">
                            <a href="{{ route('add_wishlist', $product->id) }}" class="hover-li-top" aria-hidden="true">
                                <span class="nav-icon fa fa-heart-o" style="color:Red"></span>
                                {{ trans('common.product.add_wishlist') }}
                            </a>
                        </div>
                        @endif
                        <div class="compare_count thanh-product-detail">
                            <a href="{{ route('add_compare', $product->id) }}" onclick="addCompare()" class="hover-li-top" aria-hidden="true" style="margin-left: 20px">
                                <span class="fa fa-balance-scale" style="color: orangered"></span>
                                {{ trans('common.product.add_compare') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="cmt">
                <div>
                    <div>
                        <h2>{{ trans('common.product_detail.description') }}</h2>
                        <h4 class="description-product">{!! $product->description !!}</h4>
                        <hr>
                    </div>
                </div>

                <br>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">{{ trans('common.button.comment') }}</a></li>
                        <li><a data-toggle="tab" href="#menu1">{{ trans('common.button.rating') }}</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active" style="width: 70%">
                            <div class="post-comment padding-top-40" style="margin-top: 20px">
                                <h2>{{ trans('common.tag.leave_comment') }}</h2>
                                @if(Auth::user())
                                    <div class="form-group" style="margin-top: 15px">
                                        <textarea class="form-control" name="content_parent_comment" rows="8"></textarea>
                                    </div>
                                    <p>
                                        <button  style="margin: 10px" class="btn btn-primary parent-comment" data-url="{{ url('product/'.$product->id.'/comments') }}">
                                            {{ trans('common.button.comment') }}
                                        </button>
                                        ({{ count($comments) }} {{ trans('common.button.comment') }})
                                    </p>
                                @else
                                    <br>
                                    <h5>{{ trans('common.product_detail.login_to_comment') }}</h5>
                                @endif
                            </div>
                            <div class="comments" style="margin-top: 50px;">
                                @if(Auth::check())
                                    {!! Form::hidden('username', auth()->user()->name) !!}
                                @endif
                                @foreach ($product->comments as $comment)
                                    @if($comment->parent_id == null)
                                        <div class="media comment-parent">
                                            <a href="javascript:;" class="pull-left">
                                                <img src="" alt="" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    @if(Auth::check())
                                                    @if(Auth::user()->avatar)
                                                        <img src="{{ url(config('model.user.upload')) }}/{{ Auth::user()->avatar }}"
                                                             width="37px" style="border-radius: 50%; border:1px solid #2196f3">
                                                    @endif
                                                    <strong>
                                                        {{ $comment->user->name }}
                                                    </strong>
                                                    <span>
                                                        <span style="font-size: 15px">{{ $comment->created_at->diffForHumans() }}</span> /
                                                        <a class="reply-parent" id="{{ $comment->id }}">
                                                            <span style="font-size: 15px">{{ trans('common.button.reply') }}</span>
                                                        </a>
                                                    </span>
                                                    @endif
                                                </h4>
                                                <p class="content-cmt">{{ $comment->content }}</p>
                                                <div class="input-group input-{{ $comment->id }}" style="display: none">
                                                    <input type="text" class="form-control content-reply" id="comment-{{ $comment->id }}"
                                                           name="content-reply">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success reply-button" id="rep{{ $comment->id }}"
                                                                data-url="{{ url('product/'.$product->id.'/replies') }}">
                                                            {{ trans('common.button.reply') }}
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
                                                                    @if(Auth::check())
                                                                    @if(Auth::user()->avatar)
                                                                        <img src="{{ url(config('model.user.upload')) }}/{{ Auth::user()->avatar }}"
                                                                             width="37px" style="border-radius: 50%; border:1px solid #2196f3">
                                                                    @endif
                                                                    <strong>{{ $row->user->name }}</strong>
                                                                    <span style="font-size: 15px">{{ $row->created_at->diffForHumans() }}</span>
                                                                    @endif
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
                            <h2 class="text-left">{{ trans('common.tag.comment_by_facebook') }}</h2>
                            <div class="comment">
                                <div class="media">
                                    <div class="fb-comments" data-href="http://localhost:8000/product/{{ $product->id }}" data-width="100%" data-numposts="2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade"  style="width:100%;">
                            <h2 style="margin-top: 20px">{{ trans('common.button.rating') }}</h2>
                            <div>
                                <div style="margin-left:20px;width:80%">
                                    <div class="thanh-rating row" style="margin-top: 15px">
                                        <div class="form-rating col-md-6">
                                            {!! Form::open(['route' => ['rating', $product->id], 'method' => 'post']) !!}
                                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                                   data-step="1" value="{{ $product->userAverageRating}}" data-size="xs">
                                            <input type="hidden" name="id" required="" value="{{ $product->id }}">
                                        </div>
                                        <div class="button-rating col-md-6">
                                            @if(Auth::user())
                                                <button type="submit" class="btn btn-warning">{{ trans('common.button.rating') }}</button>
                                            @else
                                                <br>
                                                <h5>{{ trans('common.product_detail.login_to_rate') }}</h5>
                                            @endif
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input id="" name="prodId" type="hidden" value="{{ $product->id }}">
            </div>
        </div>
        <input id="" name="prodId" type="hidden" value="">
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
                let name = $("input[name='username']").val();

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {content: content},
                    dataType: "json",
                    success: function (data) {
                        let id = data.comment.id;
                        let productId = data.comment.commentable_id;
                        let url = 'http://localhost:8000/product/' + id + '/replies';
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
                            '                                                        <span style="font-size: 15px">' + data.time + '/ <a class="reply-parent" id="' + id + '">'+ data.reply +'</a></span>\n' +
                            '                                                    </h4>\n' +
                            '                                                    <p class="content-cmt">' + content + '</p>\n' +
                            '                                                    <div class="input-group input-' + id + '" style="display: none">\n' +
                            '                                                         <input type="text" size="50" class="form-control content-reply" id="comment-' + id + '" name="content-reply">\n' +
                            '                                                         <span class="input-group-btn">\n' +
                            '                                                           <button class="btn btn-success reply-button" id="rep' + id + '" data-url="' + url + '">'+ data.reply +'\n' +
                            '                                                           </button>\n' +
                            '                                                         </span>\n' +
                            '                                                    </div>\n' +
                            '                                                    <div id="replies-box" class="comment-replies-' + id + '">\n' +
                            '                                                    </div>\n' +
                            '                                                </div>\n' +
                            '                                            </div>\n' +
                            '<input id="" name="prodIddđd" type="hidden" value="'+productId+'">'
                        $('.comments').append(comment);
                    }

                });
            });



            $(document).on('click', '.reply-parent', function (e) {
                let id = $(this).attr('id');
                $('.input-' + id).toggle();
            });

            $(document).on('click', '.reply-button', function (e) {
                let href = $(this).attr('data-url');
                let parent_id = $(this).attr('id').substring(3);
                let content = $('#comment-' + parent_id).val();
                let productId = $("input[name='prodId']").val();

                $.ajax({
                    type: 'POST',
                    url: href,
                    data: {repContent: content, parent_id: parent_id, productId: productId},
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
                            '                     <spanstyle="font-size: 15px">' + data.time + '</span></h4>\n' +
                            '                   <p  class="content-cmt">' + content + '</p>\n' +
                            '            </div>\n' +
                            '        </div>'

                        $('.comment-replies-' + parent_id).append(reply);
                        $('.input-' + parent_id).css('display', 'none');
                    }
                });
            });
        });

</script>
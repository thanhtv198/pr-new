@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
    <body>
    <div class="container time-line" view="time-line">
        <h2 class="time-line-head">{{ trans('common.title_form.wishlist') }}</h2>
            <div class="tab-content">
                <div id="home" class="">
                    @foreach($products as $row)
                        <div class="row" id="row-{{ $row->id }}">
                            <div class="col-md-3">
                                <div class="men-pro-item simpleCart_shelfItem box-pro">
                                    <div class="men-thumb-item">
                                        <img src="{{ url(config('app.productUrl')) }}/{{$row->id}}/{{ $row->images[0]['image'] }}"
                                             alt="{{ $row->name }}" width="220px" height="250px">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{ route('detail_product', $row->id) }}"
                                                   class="link-product-add-cart">
                                                    {{ trans('common.home_page.view_product') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="compare_count product-new-top">
                                            <a href="{{ route('add_compare', $row->id) }}" onclick="addCompare()"
                                               class="fa fa-balance-scale" id="compare"></a>
                                        </div>
                                    </div>
                                    <div class="item-info-product ">
                                        <h4>
                                            <a href="{{ route('detail_product', $row->id) }}">{{ $row->name }}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            @php $price_new = $row->price - $row->promotion @endphp
                                            @if ($row->promotion > 0)
                                                <span class="item_price">{{ number_format($price_new) }}đ</span>
                                                <del>{{ number_format($row->price) }}đ</del>
                                            @else
                                                <span class="item_price">
                                                    {{ number_format($price_new) }}đ
                                                </span>
                                            @endif
                                        </div>
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                            <div class="product-icon-container">
                                                <a href="{{ route('add_cart', $row->id) }}" onclick="addToCart()">
                                                    {{ Form::submit(trans('common.button.add_cart'), ['class' => 'button']) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                {{ $row->description }}
                            </div>
                            <div class="col-md-2" >
                                <p class="del-button" id="{{ $row->id }}" data-url="{{ route('delete_wishlist', $row->id) }}">
                                    <button type="button"  style="margin-top: 50%; width: 70%" class="btn btn-block btn-danger">Delete</button>
                                </p>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    <div class="clearfix"></div>
    </body>
@endsection


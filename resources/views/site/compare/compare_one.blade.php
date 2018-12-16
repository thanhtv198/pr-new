@extends('site/layouts/master')
@section('content')
    <div class="container">
        <div class="compare">
            <div class="main">
                <h1 id="title-compare">{{ trans('common.tag.compare_product') }}</h1>
                @include('site.notice')
                <div class="products">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>{{ trans('common.product.name') }}</th>
                            <th><a href="{{ route('detail_product', $products[0]->id) }}">{{  $products[0]->name }}</a></th>
                        </tr>
                        </thead>
                        <tr>
                            <td>{{ trans('common.product.image') }}</td>
                            <td>
                                <img src="{{ url(config('app.productUrl')) }}/{{ $products[0]['id'] }}/{{ $image0['image'] }}"
                                     width="200px" height="250px">
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.price') }}</td>
                            <td>
                                <span class="item_price">{{ number_format($products[0]->price - $products[0]->promotion) }}đ</span>
                                @if ($products[0]->promotion > 0)
                                    <del>{{ number_format($products[0]->price) }}đ</del>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.screen') }}</td>
                            <td>{{ $products[0]->screen }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.os') }}</td>
                            <td>{{ $products[0]->os }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.front_camera') }}</td>
                            <td>{{ $products[0]->front_camera }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.back_camera') }}</td>
                            <td>{{ $products[0]->back_camera }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.cpu') }}</td>
                            <td>{{ $products[0]->cpu }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.ram') }}</td>
                            <td>{{ $products[0]->ram }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.memory') }}</td>
                            <td>{{ $products[0]->memory }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.sim') }}</td>
                            <td>{{ $products[0]->sim }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.battery') }}</td>
                            <td>{{ $products[0]->battery }}</td>
                        </tr>
                        @if(isset($products[0]->customizeProducts))
                            @foreach($products[0]->customizeProducts as $p)
                                <tr>
                                    <td>{{ json_decode($p->property) }}</td>
                                    <td>{{ $p->detail }}</td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td>{{ trans('common.product.address_sell') }}</td>
                            <td>{{ $products[0]->user->city->name . ', '. $products[0]->user->address }}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('common.product.action') }}</td>
                            <td>
                                <div class="line">
                                    <div class="pull-left">
                                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out thanh-detail">
                                            <div class="product-icon-container thanh-add-car-compare">
                                                <a href="{{ route('add_cart', $products[0]->id) }}" onclick="addToCart()">
                                                    {{ Form::submit(trans('common.button.add_cart'), ['class' => 'btn btn-info']) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('delete_compare', $rowId[0]) }}">
                                            <button class="btn btn-danger">{{ trans('common.button.remove') }}</button>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


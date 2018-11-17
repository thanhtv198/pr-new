@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
    <body>
    <div class="container time-line" id=" thanh-container" view="time-line">
        <h2 class="time-line-head">{{ trans('common.interact.title') }}</h2>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">{{ trans('common.interact.sold') }}</a></li>
            <li><a data-toggle="tab" href="#menu1">{{ trans('common.interact.bought') }}</a></li>
            <li><a data-toggle="tab" href="#menu2">{{ trans('common.interact.respond') }}</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>{{ trans('common.interact.sold') }}</h3>
                <div class="checkout-right">
                    <h4>{{ trans('common.sold.your_product_sold') }}</h4>
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>{{ trans('common.product.code') }}</th>
                                <th>{{ trans('common.form.name') }}</th>
                                <th>{{ trans('common.form.email') }}</th>
                                <th>{{ trans('common.form.phone_number') }}</th>
                                <th>{{ trans('common.form.address') }}</th>
                                <th>{{ trans('common.product.product') }}</th>
                                <th>{{ trans('common.product.qty') }}</th>
                                <th>{{ trans('common.product.price') }}</th>
                                <th>{{ trans('common.product.created_at') }}</th>
                                <th>{{ trans('common.form.status') }}</th>
                                <th>{{ trans('common.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="cart_table">
                            @foreach ($orderSolds as $row)
                                <tr class="rem1">
                                    <td class="invert">{{ $row->id }}</td>
                                    <td class="invert">{{ $row->order->name }}</td>
                                    <td class="invert">{{ $row->order->email }}</td>
                                    <td class="invert">{{ $row->order->phone_number }}</td>
                                    <td class="invert">{{ $row->order->address . ", " . $row->order->city->name }}</td>
                                    <td class="invert"><a href="{{ route('detail_product', $row->id) }}">{{ $row->product->name }}</a></td>
                                    <td class="invert">{{ $row->quantity }}</td>
                                    <td class="invert">
                                        <span class="item_price" id="pendding">{{ number_format($row->price) }}  </span>
                                    </td>
                                    <td class="invert">
                                        {{ date('d-m-Y', strtotime($row->created_at)) }}
                                        <h6>{{ $row->created_at->diffForHumans() }}</h6>
                                    </td>
                                    <td class="invert">
                                        @if ($row->status == 0)
                                            <span>
                                            <a href="{{ route('handle_sold', $row->id) }}" id="pendding">
                                                {{ trans('common.respond.handle_now') }}
                                            </a>
                                        </span>
                                        @elseif ($row->status == 1)
                                            <i class="fa fa-check-circle">
                                                {{ trans('common.respond.handled') }}
                                            </i>
                                        @elseif ($row->status == 2)
                                            <i class="fa fa-remove" id="pendding">
                                                {{ __('Order is Canceled') }}
                                            </i>
                                        @endif
                                    </td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{ route('delete_order_sold', $row->id) }}" class="delete delele-order"
                                               onclick="deleteSold(this)">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                        <br>
                        <div class="export">
                            <a href="{{ route('export') }}" class="btn btn-info export" id="export-button">
                                {{ trans('common.sold.export') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>{{ trans('common.interact.bought') }}</h3>
                <div class="checkout-right">
                    <h4>{{ trans('common.bought.your_product_bought') }}</h4>
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>{{ trans('common.product.code') }}</th>
                                <th>{{ trans('common.product.total') }}</th>
                                <th>{{ trans('common.form.note') }}</th>
                                <th>{{ trans('common.form.date_order') }}</th>
                                <th>{{ trans('common.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="cart_table">
                            @foreach ( $orderBoughts as $row )
                                <tr class="rem1">
                                    <td class="invert">{{ $row->id }}</td>
                                    <td class="invert">
                                        <div class="info-product-price">
                                            <span class="item_price">{{ number_format($row->total) }}</span>
                                        </div>
                                    </td>
                                    <td class="invert">{{ $row->note }}</td>
                                    <td class="invert">{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{ route('get_order_bought_detail', $row->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i></a> |
                                            <a href="{{ route('delete_order_bought', $row->id) }}" class="delete" onclick="deleteSold(this)">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>{{ trans('common.interact.respond') }}</h3>
                @foreach($responds as $row)
                    <div class="row">
                        <div class="col-md-3">
                            <h4>
                                <a href="">{{ $row->title }}</a>
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <p class="content-post">{!! $row->content !!}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="">{!! $row->status !!}</p>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    </body>
@endsection


{{--<div class="pull-left">--}}
    {{--<a href="{{ route('get_order_bought') }}">{{ trans('common.info.buy_history') }}</a></br>--}}
    {{--<a href="{{ route('get_order_sold') }}">{{ trans('common.info.order') }}</a>--}}
{{--</div>--}}

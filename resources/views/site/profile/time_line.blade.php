@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <!-- Main content -->
    <body>
    <div class="container time-line" view="time-line">
        <h2 class="time-line-head">{{ trans('common.time_line.title') }}</h2>
        <div class="tab-time-line">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">{{ trans('common.time_line.sell') }}</a></li>
                <li><a data-toggle="tab" href="#menu1">{{ trans('common.time_line.discuss') }}</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>{{ trans('common.time_line.sell') }}</h3>
                    @foreach($sellings as $row)
                        <div class="row">
                            <div class="col-md-3" style="text-align: center">
                                <img src="{{ url(config('app.productUrl')) }}/{{$row->id}}/{{ $row->images[0]['image'] }}"
                                     alt="{{ $row->name }}" width="220px" height="250px">
                                <h4>
                                    <br>
                                    <a style="font-size: 22px" href="{{ route('detail_product', $row->id) }}">{{ $row->name }}</a>
                                </h4>
                                <p>
                                    <span class="item_price">{{ number_format($row->price - $row->promotion) }}đ</span>
                                    <del>{{ number_format($row->price) }}đ</del>
                                </p>
                            </div>
                            <div class="col-md-9">
                                {{ $row->description }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

                <div id="menu1" class="tab-pane fade">
                    <h3>{{ trans('common.time_line.discuss') }}</h3>
                    @foreach($discuss as $row)
                        <div class="row">
                            <div class="col-md-3">
                                <h4>
                                    <a href="{{ route('detail_product', $row->id) }}">{{ $row->title }}</a>
                                </h4>
                            </div>
                            <div class="col-md-9">
                                <p class="content-post">{!! $row->content !!}</p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </body>
@endsection


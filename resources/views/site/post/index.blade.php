@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <section class="content">
        <div class="privacy">
            <div view="sell" class="container" >
                <!-- tittle heading -->
                <h3 class="tittle-w3l">
                    {{ trans('common.sell.your_product') }}
                    <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
                </h3>
                <div class="checkout-right">
                    <h4>
                        {{ trans('common.sell.your_sold') }}
                        <a href="{{ route('posts.create') }}">
                            <span class="fa fa-plus-square" id="plus"></span>
                        </a>
                    </h4>
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>{{ trans('common.post.title') }}</th>
                                <th>{{ trans('common.post.content') }}</th>
                                <th>{{ trans('common.post.status') }}</th>
                                <th>{{ trans('common.post.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="cart_table">
                            @foreach ($posts as $row)
                                <tr class="rem1">
                                    <td class="invert col-md-3">
                                        <a href="{{ route('home_page') }}">
                                            {{ $row->title }}
                                        </a>
                                    </td>
                                    <td class="invert col-md-7">
                                            <p class="content-post">
                                                {!! $row->content !!}
                                            </p>
                                    </td>
                                
                                    <td class="invert col-md-1">
                                        @if ($row->status == 0)
                                            <span id="pendding">{{ trans('common.respond.pendding') }}</span>
                                        @elseif ($row->status == 1)
                                            <i class="fa fa-check-circle">{{ trans('common.respond.checked') }}</i>
                                        @elseif ($row->status == 2)
                                            <i class="fa fa-minus-square" id="status-rejected">
                                                {{--  <b>{{ trans('common.respond.rejected') }}</b><br><br>
                                                <span id="reason" style="color:Red">{{ $row->check }}</span>  --}}
                                            </i>
                                        @endif
                                    </td>
                                  
                                    <td class="invert col-md-1">
                                        <div class="rem">
                                            <a href="{{ route('posts.edit', $row->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a> |
                                            <a class="delete" onclick="deleteSell(this)">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection

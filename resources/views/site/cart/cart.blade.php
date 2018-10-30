@extends('site/layouts/master')
@section('content')
    <section class="content-header">
        @include('site/notice')
    </section>
    <div class="privacy">
        <div class="container" view="cart">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                {{ trans('common.cart.cart') }}
                <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            @if(Cart::count() != 0)
                <div class="checkout-right">
                    <h4>{{ trans('common.cart.product_in_cart') }}</h4>
                    {!! Form::open(['route' => ['update_cart', 'method' => 'post', 'class' => 'form-signin']]) !!}
                    <div class="table-responsive">
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>{{ trans('common.product.name') }}</th>
                                <th>{{ trans('common.product.qty') }}</th>
                                <th>{{ trans('common.product.price') }}</th>
                                <th>{{ trans('common.form.action') }}</th>
                                <th>{{ trans('common.form.action') }}</th>
                            </tr>
                            </thead>
                            <tbody id="cart_table">
                            @foreach ($cart as $row)
                                <tr class="rem1">
                                    <td class="invert">
                                        <a href="{{ route('detail_product', $row->id) }}">
                                            {{ $row->name }}
                                        </a>
                                    </td>
                                    <td class="invert">
                                        <input type="number" class="number-in-cart" min="1" name="qty{{ $row->rowId }}" value={{ $row->qty }} required/>
                                        <input type="hidden" class="row-cart" id="row-cart{{$row->id}}" value="{{ $row->rowId }}"/>
                                    </td>
                                    <td class="invert">{{ number_format(($row->price) * $row->qty) }}</td>
                                    <td class="invert">
                                        <div class="rem">
                                            <a href="{{ route('delete_cart', $row->rowId) }}" class="delete"
                                               onclick="deleteRow(this)">
                                                <div class="close1"></div>
                                            </a>
                                        </div>
                                    </td>
                                    {{--<td class="invert">--}}
                                        {{--<div class="quantity">--}}
                                            {{--<div class="quantity-select">--}}
                                                {{--<div class="entry value-minus">&nbsp;</div>--}}
                                                {{--<div class="entry value">--}}
                                                    {{--<span>1</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="entry value-plus active" data-url="{{ url('cart/update') }}">&nbsp;</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            @endforeach
                            </tbody>
                        </table>
                        <div class="button-bottom">
                            <ul class="pull-left">
                                {!! Form::button(trans('common.button.update'), ['type' => 'submit', 'class' => 'submit check_out']) !!}
                            </ul>
                            <ul class="pull-right">
                                <a href={{route('checkout')}}>
                                    {!! Form::button(trans('common.button.order'), ['class' => 'submit check_out']) !!}
                                </a>
                            </ul>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <div class="clearfix"></div>
                </div>
            @else
                <h3>{{ __('Your cart is empty') }}</h3>
            @endif
        </div>
    </div>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.value-plus').on('click', function () {
                    var divUpd = $(this).parent().find('.value'),
                        newVal = parseInt(divUpd.text(), 10) + 1;
                    divUpd.text(newVal);
                var row = $('.row-cart').attr('id');
            alert(row);
//                var href = $(this).attr('data-url');
alert(href);
//            $.ajax({
//                type: 'POST',
//                url: href,
//                data: {quantity: row},
//                dataType: "json",
//                success: function (data) {
//
//                }
//            });
        });
    });

    $(document).ready(function(){
        $('.value-minus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.text(), 10) - 1;
            if (newVal >= 1) divUpd.text(newVal);
        });
    });
</script>
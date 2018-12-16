<!DOCTYPE html>
<html>
<br>
<body>
<h3>{{ trans('common.mail.welcome_order') }}</h3>
<br>
<div class="message">
    {{ trans('common.mail.total_price') }}: <span style="color: red">{{ $order->total  }}đ</span>
    <br>
    <table class="timetable_sub table-hover">
        <thead>
        <tr>
            <th>{{ trans('common.product.name') }}</th>
            <th>{{ trans('common.product.qty') }}</th>
            <th>{{ trans('common.product.price') }}</th>
        </tr>
        </thead>
        <tbody id="cart_table">

        @foreach ($content as $key => $row)
            <tr class="rem1">
                <td class="invert">
                    <a href="{{ route('detail_product', $row->id) }}">
                        {{ $row->name }}
                    </a>
                </td>
                <td class="invert">
                    <p>{{ $row->qty }}</p>
                </td>
                <td class="invert">{{ number_format(($row->price) * $row->qty) }}</td>
        @endforeach
        </tbody>
    </table>
    <br/>
<br/>
<br/>

</body>

</html>
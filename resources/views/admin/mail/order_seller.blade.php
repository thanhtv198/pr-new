<!DOCTYPE html>
<html>
<br>
<body>
<h3>{{ trans('common.mail.welcome_order_seller') }}</h3>
<br>
<div class="message">
    {{ trans('common.mail.order_from') }}:
    <span style="color: red">{{ $order->name }};  {{ $order->email }} - {{ $order->phone_number }};  {{ $order->address.','. $order->city->name }}</span>
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
            <tr class="rem1">
            <td class="invert">
               {{ $orderDetail->product->name }}
            </td>
            <td class="invert">
                {{ $orderDetail->quantity }}
            </td>
            <td class="invert">{{ number_format(($orderDetail->price) *  $orderDetail->quantity) }}</td>
        </tbody>
    </table>
    <br/>
<br/>
<br/>

</body>

</html>
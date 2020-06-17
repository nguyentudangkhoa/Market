<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thanks Letter</title>
    <base href="{{asset('')}}">
</head>
<body>
    <h1>{{$data['title']}}</h1>
    <p>{{$data['body']}}</p>
    <p>Dear {{$data['full_name']}}</p>
    <table border="1 solid">
        <tr>
            <th>Product name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

    @foreach ($data['item'] as $key=>$value )
        <tr>
            <td>{{$value['item']->name}}</td>
            <td>{{$value['qty']}}</td>
            @if ($value['item']->promotion_price>0)
                <td>{{number_format($value['item']->promotion_price)}}VND</td>
            @else
                <td>{{number_format($value['item']->unit_price)}}VND</td>
            @endif
        </tr>
    @endforeach
        <tr style="background-color: aqua" style="float: right">
            <td colspan="3">Total: {{number_format($data['Total'])}}VND</td>
        </tr>
    </table>
    <p>{{$data['content']}}</p>
    <p>{{$data['last']}}</p>
</body>
</html>

@extends('master')
@section('content')
@if(Auth::check())
@if(Auth::user()->authority == 1)
<div class="bill-details" style="padding-left:30%;padding-top:5%;padding-bottom:10%">
    <div style="margin-left:20%"><h1>Bill Details</h1></div>
    <div class="company-name" style="margin-top:30px;">
        <h3>Grocery Shoppy</h3>
        <div>
            <img src="source/images/logo2.png" alt=" ">
        </div>
    </div>
        <label style="margin-top:15px;">CUSTOMER NAME: {{$customer->name}}</label><br>
        <label style="margin-top:15px;">PHONE NUMBER: {{$customer->phone_number}}</label><br>
        <label  style="margin-top:5px;"><h3>Product:</h3> </label>
    <table border="1" style="text-align:center  ">
        <tr >
            <th>
                Name product
            </th>
            <th>
                Quantity
            </th>
            <th></th>
            <th>Discout price</th>
            <th>
                Price
            </th>
            <th>Total</th>
        </tr>
    @foreach ($array as $item)
        <tr>
            <td > {{$item->name}}</td>
            <td>  {{$item->quantity}}<td>
            @if ($item->promotion_price!=0)
                <td>{{number_format($item->promotion_price)}}   VND</td>
            @else
                <td>0 VND</td>
            @endif
            <td> {{number_format($item->unit_price)}}   VND   </td>
            @if ($item->promotion_price!=0)
                <td>{{number_format($item->promotion_price * $item->quantity)}}   VND</td>
            @else
                <td>{{number_format($item->unit_price * $item->quantity)}}   VND</td>
            @endif
        </tr>
    @endforeach
        <tr>
            <td>Total price</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{number_format($bill->total)}} VND</td>
        </tr>
    </table>
    <label style="margin-top:5px;"><h3>Payment: {{$bill->payment}}</h3> </label><br>
    <label style="margin-top:5px;"><h3>Address customer: {{$customer->address}}</h3></label> <br>
    <form action="{{route('PDF',$bill->id)}}" method="get">
        <button type="submit" class="btn btn-danger" style="boder-width:0px; margin-top:10px">Export PFD</button>
    </form>
</div>
@else
<div class="address_form_agile">
        <h4>Page do not exist</h4>
</div>
@endif
@else
<div class="address_form_agile">
    <h4>Page do not exist</h4>
</div>
@endif
@endsection

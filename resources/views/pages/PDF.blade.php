
<div class="bill-details" style="padding-left:5%;padding-top:5%;padding-bottom:10%">
    <div style="margin-left:40%"><h1>Bill Details</h1></div>
    <div class="company-name" style="margin-top:30px;">
        <h3>Grocery Shoppy</h3>
        <div>
            <img src="source/images/logo2.png" alt=" ">
        </div>

    </div>
    <div class="customer-name" style="margin-top:15px;">
        <h3>CUSTOMER NAME: {{$customer->name}}</h3><br>
        <h3 style="margin-top:15px;">PHONE NUMBER: {{$customer->phone_number}}</h3>
    </div>
    <div class="product" style="margin-top:5px;">
        <label><h3>Product:</h3> </label>
    </div>
    <table border="1" style="text-align:center;border: 1px solid black;border-collapse: collapse;  ">
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
    <label style="margin-top:5px;"><h3>Payment: {{$bill->payment}}</h3> </label> <br>
    <label style="margin-top:5px;"><h3>Address customer: {{$customer->address}}</h3></label> <br>
    <label style="margin-top:5px;"><h3>Check your package before payment</h3></label>
</div>

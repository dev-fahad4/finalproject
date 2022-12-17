@extends('layouts.app')

@section('content')
    <div  align="center" style="padding-bottom:15px; padding-top:5px"><h3><b>{{ __(Auth::User()->name)}}{{("'s Medicine Cart") }}</b></h3></div>
    
    <div>
       
        <table style="border:1px solid black; width: 75%"> 
            
            @if($total != 0)
                <tr align="center">
                    <th style="padding: 30px">Medicine ID</th>  <!-- th=table header-->
                    <th style="padding: 30px">Medicine Name</th>
                    <th style="padding: 30px">Price (tk)</th>
                    <th style="padding: 30px">Amount (piece)</th>
                    <th style="padding: 30px">Sub-Total (tk)</th>
                    <th style="padding: 30px">Action</th>
                </tr>

                @foreach ($cartData as $data)
                    @if($data->user_id==Auth::User()->id)
                        <tr align="center">
                            <td>{{$data->medicine_id}}</td><!-- td= table data-->

                            <td>{{$data->medicine_name}}</td>

                            <td>{{$data->unit_price}}</td>

                            <td>{{$data->medicine_amount}}</td>

                            <td>{{$data->medicine_unitized_price}}</td>
                            <td><a role="button" class="btn btn-primary" href="{{url('/cart/removeItem',[$data->id,$sortBy])}}">Remove</a></td>
                        </tr>
                    @endif
                @endforeach
                <tr align="center">
                        <td></td><!-- td= table data-->

                        <td></td>

                        <td></td>

                        <td style="text-align:right">{{"Total amount = "}}</td>

                        <td>{{$total}} Taka</td>

                        <td><a role="button" class="btn btn-primary" href="{{url('/cart/paymentForm', $total)}}">Check Out</a></td>
                    </tr>
                @else
                    <tr >
                        <td>
                            <center><h2 style="padding:70px 0px"><b>{{"No medicine has been added yet"}}</b></h2></center> 
                        </td>
                    </tr>
                   
                @endif
        </table>

    </div>
@endsection










                            
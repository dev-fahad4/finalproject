@extends('layouts.app')

@section('content')
    <div  align="center"><h3><b>{{ __('Welcome to Anya\'s Pharmacy') }}</b></h3></div>
    
    <div>
        <table style="border:1px solid black; width: 75%">
            <tr align="center">
                <th style="padding: 30px">Medicine Name</th>  <!-- th=table header-->
                <th style="padding: 30px">Medicine Type</th>
                @if (Auth::User()->role=="a")
                    <th style="padding: 30px">Medicine Count</th>
                @endif
                <th style="padding: 30px">Availability</th>
                <th style="padding: 30px">Unit Price (tk.)</th>
                <th style="padding: 30px">Amount</th>
                <th style="padding: 30px">Cart Action</th>
            

            </tr>

            @foreach ($mediData as $data)
                <tr align="center">
                    <td>{{$data->medicine_name}}</td><!-- td= table data-->

                    <td>{{$data->medicine_type}}</td>

                    @if (Auth::User()->role=="a")
                        <td>{{$data->medicine_count}}</td>
                    @endif

                    @if ($data->Availability)
                        <td>{{"In Stock"}}</td>
                    @else
                        <td>{{"Out of Stock"}}</td>
                    @endif
                    <td>{{$data->unit_price}}</td>
                    
                    <div>
                        <form action="/pharmacy/addMediToCart">
                            <td>
                                <div style="padding-top:5px" >
                                    <input type="number" id="medicine_amount" name="medicine_amount" required>
                                    
                                    <input id="u_id" name="user_id" value="<?=Auth::User()->id?>" hidden>
                                    <input id="medicine_name" name="medicine_name" value="<?=$data->medicine_name?>" hidden>
                                    <input id="medicine_price" name="medicine_price" value="<?=$data->unit_price?>" hidden>
                                    <input id="medicine_id" name="medicine_id" value="<?=$data->id?>" hidden>
                                    <input id="unit_price" name="unit_price" value="<?=$data->unit_price?>" hidden>
                                    <input id="sortBy" name="sortBy" value="<?=$sortBy?>" hidden>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </td>
                        </form>
                    </div>
                    
                </tr>
            @endforeach
        </table>
    </div>
@endsection










                            
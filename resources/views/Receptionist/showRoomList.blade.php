@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> <!--Container width-->
            <div class="card">
                <div class="card-header" align="center"><h3><b>{{ __('Hospital Room List') }}</b></h3>
                    
                    <!-- Drop down button for sorting -->
                    <div align = "right">
                       {{" Sort By:"}}
                        <li class="nav-item dropdown" style="list-style: none; float: right; padding-left: 10px;"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{$sortBy}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/receptionist/showRoomList', $sortBy='Default') }}">
                                    {{ __('Default') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/receptionist/showRoomList',$sortBy='Booked') }}">
                                    {{ __('Booked') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/receptionist/showRoomList',$sortBy='Available')}}">
                                    {{ __('Available') }}
                                </a>
                            </div>
                        </li>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align='center' style ="position relative; color: black;" >
                   
                        <table bgcolor='#f5f5f5' >
                            <tr align="center">
                                <th style="padding: 30px">Room Number</th>  <!-- th=table header-->
                                <th style="padding: 30px">Booked by User ID</th>
                                <th style="padding: 30px">Booking Date</th>
                                <th style="padding: 30px">Availability</th>
                                <th style="padding: 30px">Action</th>

                            </tr>


                            @foreach ($roomData as $data)
                                @if ($data-> id %2!=0)
                                    <tr align="center" bgcolor='white'>
                                @else
                                    <tr align="center" bgcolor='#f5f5f5'>
                                @endif
                                       
                                        <td>{{$data->room_number}}</td>

                                        @if ($data->user_id == 0)
                                            <td>{{"None"}}</td>
                                        @else 
                                            <td>{{$data->user_id}}</td> 
                                        @endif

                                        @if ($data->booking_time == "0000-00-00" or $data->booking_time == "0001-01-01")
                                        <td>{{"N/A"}}</td>
                                        @else     
                                            <td>{{$data->booking_time}}</td> 
                                        @endif

                                        @if ($data->availability)
                                            <td>{{"Available"}}</td>
                                            <td><a role="button" class ="btn btn-primary" style="width: 70px;" href="{{url('/receptionist/bookRoom',[$data->room_number,$sortBy])}}">Book</a></td> 
                                            
                                        @else
                                            <td>{{"Booked"}}</td>
                                            <td><a role="button" class ="btn btn-primary" href="{{url('/receptionist/cancelRoomBook',[$data->room_number,$sortBy])}}">Cancel</a></td> 
                                        @endif

                                    </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


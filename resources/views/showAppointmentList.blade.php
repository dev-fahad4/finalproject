@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" align="center"><h3><b>{{ __('Appointment List') }}</b></h3>

                    <div align="center" style="padding-left:50px; padding-top:10px">
                        <form action="/appointment/search">
                            <input type="text" id="dName" name="dName" value="<?=$searchData?>" style="height:33px;width:400px" required>

                            <button type="submit" class="btn btn-primary" style="height: 35px">{{"Search"}}</button>
                           
                        </form>
                    </div>
                <!-- Drop down button for filtering -->
                    <div align = "right">
                        {{" Filter By:"}}
                        <li class="nav-item dropdown" style="list-style: none; float: right; padding-left: 10px;"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{$filterBy}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/showAppointmentList', $sortBy='All') }}">
                                    {{ __('All') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/showAppointmentList',$sortBy='Booked') }}">
                                    {{ __('Booked') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/showAppointmentList',$sortBy='Available')}}">
                                    {{ __('Available') }}
                                </a>
                                <a class="dropdown-item" href="{{ url('/showAppointmentList',$sortBy='My Appointment')}}">
                                    {{ __('My Appointments') }}
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
                        @if($notFound == 0)
                            <tr align="center">
                                <!-- th=table header-->
                                <th style="padding: 30px">Doctor Name</th>
                                <th style="padding: 30px">Day</th>
                                <th style="padding: 30px">Date</th>
                                <th style="padding: 30px">Time</th>
                                <th style="padding: 30px">Availability</th>
                                <th style="padding: 30px">Action</th>
                            </tr>

                            @foreach ($appointData as $data)
                                <tr align="center">
                                    <!-- finding out doctor name from doctorData using doctor id from appointData -->
                                    @foreach ($doctorData as $dData => $value)
                                        @if($value->id == $data->doctor_id)
                                            <td>{{$value->name}}</td>
                                        @endif
                                    @endforeach
                                    
                                    <td>{{$data->day}}</td>
                                    <td>{{$data->date}}</td>
                                    <td>{{$data->time}}</td>
                                    @if($data->user_id == 0)
                                        <td>{{"Available"}}</td>
                                        <td><a role="button" style="width: 70px" class ="btn btn-primary" href="{{url('/showAppointmentList/book',$data->id)}}">Book</a></td> 
                                    @else
                                        <td>{{"Not available"}}</td>
                                        @if($data->user_id==Auth::User()->id)
                                            <td><a role="button" class ="btn btn-primary" href="{{url('/showAppointmentList/cancel',$data->id)}}">Cancel</a></td> 
                                        @else
                                            <td>{{"Not Available"}}</td>
                                        @endif
                                    @endif
                                    
                                </tr>
                            @endforeach
                        @else
                            <td><h4>No Doctor Found By the name "{{$searchData}}"</h4></td>
                        @endif
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

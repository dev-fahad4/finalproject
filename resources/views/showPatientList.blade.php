@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <!-- checking if the one who called this is an admin or receptionist -->
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" align="center"><h3><b>{{ __('Patient List') }}</b></h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align='center' style ="position relative; color: black;" >
                   
                    <table  bgcolor='#f5f5f5' >
                        <tr align="center">
                            <th style="padding: 30px">User ID</th>  <!-- th=table header-->
                            <th style="padding: 30px">Name</th>
                            <th style="padding: 30px">Email</th>
                            <th style="padding: 30px">Contact</th>
                            <th style="padding: 30px">Address</th>
                            @if (Auth::User()->role=="a" or is_numeric($data))
                            <th style="padding: 30px">Action</th>
                            @endif

                        </tr>

                        <!-- data is numeric when this view is called for ambulance booking passing ambulance id as "data" -->
                        @if (!is_numeric($data))
                            @foreach ($data as $data)
                                @if ($data -> role == "p")
                                    <tr align="center">
                                        <td>{{$data->id}}</td><!-- td= table data-->
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->contact_number}}</td>
                                        <td>{{$data->address}}</td> 
                                        @if(Auth::User()->role=="a")
                                        <td><a role="button" class ="btn btn-primary" href="{{url('/admin/removePatient',$data->id)}}">Remove</a></td> 
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            @foreach ($patientData as $pdata)
                                @if ($pdata -> role == "p")
                                    <tr align="center">
                                        <td>{{$pdata->id}}</td><!-- td= table data-->
                                        <td>{{$pdata->name}}</td>
                                        <td>{{$pdata->email}}</td>
                                        <td>{{$pdata->contact_number}}</td>
                                        <td>{{$pdata->address}}</td> 
                                        @if(!(App\Models\hospital_rooms::where('room_number',$data)->exists()))
                                            <!-- this patient list for booking ambulance -->
                                            <td><a role="button" class ="btn btn-primary" href="{{url('/receptionist/selectPatientforAmbuBooking',[$data, $pdata->id,$sortBy])}}">Select</a></td> 
                                        @else
                                            <!-- this patient list for booking hospital room -->
                                            <td><a role="button" class ="btn btn-primary" href="{{url('/receptionist/selectPatientforRoomBooking',[$data, $pdata->id,$sortBy])}}">Select</a></td> 
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


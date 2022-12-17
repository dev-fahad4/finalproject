@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            <div class="card">
            <div class="card-header" align="center"><h3><b>{{ __('Receptionist Candidate List') }}</b></h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align='center' style ="position relative; color: black;" >
                    @if(!$recepCandData->isEmpty())
                        <table bgcolor='#f5f5f5' >
                            <tr align="center">
                                <th style="padding: 20px">Candidate ID</th>  <!-- th=table header-->
                                <th style="padding: 20px">Name</th>
                                <th style="padding: 10px">Email</th>
                                <th style="padding: 10px">Date of Birth</th>
                                <th style="padding: 20px">Contact</th>
                                <th style="padding: 20px">Address</th>
                                <th style="padding: 20px">SSC</th>
                                <th style="padding: 20px">HSC</th>
                                <th style="padding: 20px">Honours</th>
                                <th style="padding: 20px">Further Educational Qualifications</th>
                                <th style="padding: 20px">Action</th>

                            </tr>


                            @foreach ($recepCandData as $data)
                                <tr align="center">
                                    <td>{{$data->id}}</td><!-- td= table data-->
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->date_of_birth}}</td>
                                    <td>{{$data->contact_number}}</td>
                                    <td>{{$data->Address}}</td>
                                    <td>{{$data->SSC}}</td>
                                    <td>{{$data->HSC}}</td>
                                    <td>{{$data->Honours}}</td>
                                    <td>{{$data->further_education_details}}</td>
                                    <td>
                                    <div style="padding-bottom:5px">
                                    <a role="button" class ="btn btn-primary"  href="{{url('/admin/addRecep',$data->id)}}">Accept</a>
                                    </div>
                                    <div>
                                        <a role="button" class ="btn btn-primary" href="{{url('/admin/rejectRecepCand',$data->id)}}">Reject</a></td> 
                                    </div>
                                    
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h1>No Candidates Available</h1>
                    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


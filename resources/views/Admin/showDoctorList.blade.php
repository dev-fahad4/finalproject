@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" align="center"><h3><b>{{ __("Doctor's List") }}</b></h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style ="position relative; color: black; " align='center'>

                    <table bgcolor='#f5f5f5'>
                        <tr align="center">
                            <th style="padding: 30px">Doctor's ID</th>  <!-- th=table header-->
                            <th style="padding: 30px">Name</th>
                            <th style="padding: 30px">Email</th>
                            <th style="padding: 30px">Contact</th>
                            <th style="padding: 30px">Address</th>
                            <th style="padding: 30px">Education Details</th>
                            <th style="padding: 30px">Action</th>

                        </tr>


                        @foreach ($doctorData as $data)
                            <tr align="center">
                                <td>{{$data->id}}</td><!-- td= table data-->
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->contact_number}}</td>
                                <td>{{$data->Address}}</td> 
                                <td>{{$data->Edu_details}}</td> 
                                <td><a role="button" class ="btn btn-primary" href="{{url('/admin/removeDoctor',$data->id)}}">Remove</a></td> 
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


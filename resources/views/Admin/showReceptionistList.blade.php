@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" align="center"><h3><b>{{ __('Receptionist List') }}</b></h3></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align='center' style ="position relative; color: black;" >
                   
                    <table bgcolor='#f5f5f5' >
                        <tr align="center">
                            <th style="padding: 30px">User ID</th>  <!-- th=table header-->
                            <th style="padding: 30px">Name</th>
                            <th style="padding: 30px">Email</th>
                            <th style="padding: 30px">Contact</th>
                            <th style="padding: 30px">Address</th>
                            <th style="padding: 30px">Action</th>

                        </tr>


                        @foreach ($recepData as $data)
                            @if ($data -> role == "r")
                                <tr align="center">
                                    <td>{{$data->id}}</td><!-- td= table data-->
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->contact_number}}</td>
                                    <td>{{$data->address}}</td> 
                                    <td><a role="button" class ="btn btn-primary" href="{{url('/admin/removeRecep',$data->id)}}">Remove</a></td> 
                                </tr>
                            @endif
                        @endforeach
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


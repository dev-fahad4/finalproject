@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">{{ __('List of Receptionist Candidates') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align='center' style ="position relative; color: black;" >
                   
                    <table border='3px' bgcolor='#f5f5f5' >
                        <tr align="center">
                            <th style="padding: 30px">User ID</th>  <!-- th=table header-->
                            <th style="padding: 30px">Name</th>
                            <th style="padding: 30px">Email</th>
                            <th style="padding: 30px">Contact</th>
                            <th style="padding: 30px">Address</th>
                            <th style="padding: 30px">Action</th>

                        </tr>


                        @foreach ($recepData as $data)
                            @if ($data -> role == "u")
                                <tr align="center">
                                    <td>{{$data->id}}</td><!-- td= table data-->
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->contact}}</td>
                                    <td>{{$data->address}}</td> 
                                    <td><a href="{{url('/admin/addReceptionist',$data->id)}}">Add</a></td> 
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


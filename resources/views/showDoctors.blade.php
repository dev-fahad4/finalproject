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
                            <th style="padding: 30px">Name</th>
                            <th style="padding: 30px">Email</th>
                            <th style="padding: 30px">Education Details</th>

                        </tr>


                        @foreach ($doctorData as $data)
                            <tr align="center">
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->Edu_details}}</td> 
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


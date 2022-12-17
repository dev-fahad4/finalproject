@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="text-align:center"><h4><b>Welcome {{ __(Auth::User()->name) }}</b></h4></div>
                
                <div class="card-body">
                    <center><h5><b><u>{{ __("To Do List") }}</u></b></h5></center>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style ="position relative; color: black; " align='center'>
                        <div style="padding-bottom:10px">
                            <form action="/home/addTodoListData">
                                    <div>
                                        <input type="text" id="todo" name="todo" style="height:35px; width:500px" required>
                                        <button type="submit" class="btn btn-primary">{{"Add"}}</button>
                                    </div>
                            </form>
                        </div>
                        <table bgcolor='#f5f5f5' >
                        
                            
                            @if(!$todoData->isEmpty())
                            
                                <tr align="center">
                                    <th style="padding-right: 30px;width:700px">Todo</th>
                                    <th style="padding-left: 30px;width:170px">Action</th>
                                </tr>

                                
                                @foreach ($todoData as $data)
                                    <tr align="center">
                                        @if($data->user_id==Auth::User()->id)
                                            @if($data->done)
                                                <td><s>{{$data->todo}}</s></td>
                                            @else
                                                <td>{{$data->todo}}</td>
                                            @endif
                                            <td>
                                                <div style="padding-bottom:5px">
                                                    @if($data->done)
                                                        <a role="button" class ="btn btn-primary" href="{{url('/home/addTodoListData/doneNremove',[$data->id,$done=2])}}">Undone</a>
                                                    @else
                                                        <a role="button" class ="btn btn-primary" style="width:80px" href="{{url('/home/addTodoListData/doneNremove',[$data->id,$done=1])}}">Done</a>
                                                    @endif
                                                    
                                                    <a role="button" class ="btn btn-primary" href="{{url('/home/addTodoListData/doneNremove',[$data->id,$done=0])}}">Remove</a>
                                                </div>
                                            </td> 
                                        @endif
                                    </tr>
                                @endforeach
                                
                            
                            @else
                                <div style="Padding-bottom:20px">
                                    <h1>Yahoo!! There is nothing to do.</h1>
                                </div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


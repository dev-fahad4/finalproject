@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex-container" style="display: flex;">

                <div class="flex-container" style="display: flex; flex-direction: row;margin-left:100px;box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;background-color:white;">
                    <div style="box-sizing: border-box;margin:60px; padding-right: 10px">
                        <pre><i><h1 style="margin: 0px">Emails:</h1></i></pre>
                        <h4>adminHead@yahoo.com</h4>
                        <h4>registerHead@outlook.com</h4>
                        <h4>admin1@gmail.com</h4>
                        <h4>admin2@gmail.com</h4>
                        <h4>register1@gmail.com</h4>
                        <h4>register2@gmail.com</h4>
                        <h4>surgery.dep@gmail.com</h4>
                        <h4>ortho.dep@outlook.com</h4>
                        <h4>hr.dep@outlook.com</h4>
                    </div>
                </div>

                <div class="flex-container" style="display: flex; flex-direction:row; margin-left:20px;box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;background-color:white;">
                    <div style="box-sizing: border-box;margin:60px">
                        <pre><i><h1 style="margin: 0px">Contacts:</h1></i></pre>
                        <h4>Admin Head: 0125689</h4>
                        <h4>Register Head: 12326598</h4>
                        <h4>Admin 1: 1235698</h4>
                        <h4>Admin 2: 1236598</h4>
                        <h4>Register 1:1236598</h4>
                        <h4>Register 2:1235978</h4>
                        <h4>Surgery Department: 1236958 </h4>
                        <h4>Ortho Department: 1357896</h4>
                        <h4>HR Department: 123569874</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


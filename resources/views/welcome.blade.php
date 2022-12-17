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
            <div style="padding-bottom:20px;margin-left:-80px">
                <img src="{{URL('/images/logo-center new.jpg')}}" style = "width: 180px; height: 180px;" >
            </div>
            <div class="flex-container" style="display: flex;padding-bottom:20px; margin-left:-80px">
                <div class="flex-container" style="display: flex; flex-direction: row;box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;background-color:white;">
                    <div style="padding-top: 70px;padding-left:70px;margin-right:20px; box-sizing: border-box">
                        <pre><i><h1 style="margin: 0px">"Serving one's patient,</h1></i></pre>
                        <pre><i><h1 style="margin: 0px">            is one's existence"</h1></i></pre>
                    </div>
                    <div>
                        <img src="{{URL('/images/president.jpg')}}" style = "width: 250px; height: 250px;margin-right:20px" >
                    </div>
                </div>
            </div>

            <div class="flex-container" style="display: flex; padding:20px;margin-left:40px">
                <div class="flex-container" style="display: flex; flex-direction: row;margine:20px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;background-color:white;">
                    <div style="padding-top: 30px;padding-left:10px; box-sizing: border-box">
                        <pre><i><h4 style="margin: 0px"><p> We, the Sheikh family, stive not to be only the best within our neighbourhood <br> but also one of the best in the world. We are continiously racing towards that <br> goal while giving the possible best supports, care and treatments to our patients. <br> In the end, our patients matter us more than our goal. Because, <br> <center><h3><b>"Our goal's soul purpose is the well-being of our patients."</b></h3></center> </p></h4></i></pre>
                        
                    </div>
                </div>
            </div>

            <div class = "flex-container" style="display:flex;flex-direction: column;margin-top:40px;margin-left:-80px">
                <div><p style="font-size: 2.5rem; color: black;font-family: Helvetica, Arial, sans-serif;padding-top:5px;margin-left:-20px">Our Doctors </p></div>
                
                <div class="flex-container" style="display: flex; flex-direction: row;">
                    <div style="margin-left:-25px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"><img src="{{URL('/images/img1.jpg')}}" style = "width: 300px; height: 250px;"></div>
                    
                    <div style="margin-left:35px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"><img src="{{URL('/images/img2.jpg')}}" style = "width: 300px; height: 250px;"></div>
                    
                    <div style="margin-left:35px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"><img src="{{URL('/images/img3.jpg')}}" style = "width: 300px; height: 250px;"></div>
                </div>
            </div>

            <div class = "flex-container" style="display:flex;flex-direction: column;margin-top:70px;margin-bottom:20px; margin-right:-170px">
                <div align="right" style="margin-right:140px"><p style="font-size: 2.5rem; color: black;font-family: Helvetica, Arial, sans-serif;padding-top:5px">Our Ambulance Services</p></div>
                
                <div class="flex-container" style="display: flex; flex-direction: row;">
                    <div style="margin-left:40px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"><img src="{{URL('/images/ambu1.jpg')}}" style = "width: 300px; height: 250px;"></div>
                    
                    <div style="margin-right:35px;margin-left:35px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"><img src="{{URL('/images/ambu2.jpg')}}" style = "width: 300px; height: 250px;"></div>
                    
                    <div style="margin-right:-60px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;"><img src="{{URL('/images/ambu3.jpg')}}" style = "width: 300px; height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


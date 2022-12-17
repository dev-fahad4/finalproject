<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sheikh's Hospital</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- social media logo css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <style>
        table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin-left: auto;  
        margin-right: auto;  
        
        }

        th, td {
        text-align: center;
        padding: 10px;
        }

        tr{
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
        background-color: #FFFFFF;
        }

        /* footer css */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        footer*{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        .container{
            max-width: 1200px;
            margin:auto;
        }
        .row{
            display: flex;
            flex-wrap: wrap;
        }
        ul{
            list-style: none;
        }
        .footer{
            background-color: #24262b;
            padding-top: 25px ;
        }
        .footer-col{
            width: 33%;
            /* padding: 0 100px;  universal padding but didn't use cz needed individual varibale padding */
        }
        .footer-col h4{
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }
        .footer-col h4::before{
            content: '';
            position: absolute;
            left:0;
            bottom: -10px;
            background-color: #e91e63;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }
        .footer-col ul li:not(:last-child){
            margin-bottom: 10px;
        }
        .footer-col ul li a{
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #bbbbbb;
            display: block;
            transition: all 0.3s ease;
        }
        .footer-col ul li a:hover{
            color: #ffffff;
            padding-left: 8px;
        }
        .footer-col .social-links a{
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255,255,255,0.2);
            margin:0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }
        .footer-col .social-links a:hover{
            color: #24262b;
            background-color: #ffffff;
        }

        /*responsive*/
        @media(max-width: 767px){
        .footer-col{
            width: 50%;
            margin-bottom: 30px;
        }
        }
        @media(max-width: 574px){
        .footer-col{
            width: 100%;
        }
        }
        /*flex-wrapper is used so that can have at least some empty body aka distance between nav bar and footer if there is no data or less data.
          Need to write the code of both head and footed (basically the two items betwenn whom the distance is needed to created) 
          within the div which had this flex-wrapped implemented*/
        .flex-wrapper { 
            display: flex;
            min-height: 120vh;
            flex-direction: column;
            justify-content: space-between;
        }
</style>

</head>
<body style = "background-color: #F5F5F5">
    <div class="flex-wrapper">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    Sheikh's Hospital
                    </a>
                    <!-- portion of the dashboard where it is dynamic for admin, patient and receptionist -->
                    <!-- start -->
                    @if (Auth::ID()) <!--to check if any kind of user is logged in or not. bcz during first time login this is extendedhence will not get a user id to fetch role -->
                        <!-- admin exclusive dashboard nav parts-->
                        @if (Auth::User()->role=="a")
                                <div class="container">
                                    <div>    
                                        <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                            <a id="navbarDropdown" class="nav-link" href="{{ url('/')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{"Home"}}
                                            </a>
                                        </li>
                                    </div>
                                    <!-- Receptionist drop down menu -->
                                    <div >
                                        <li class="nav-item dropdown" style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{"Receptionist"}}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ url('/admin/showReceptionistList') }}">
                                                    {{ __('Show List') }}
                                                </a>
                                                <a class="dropdown-item" href="{{url('/admin/showReceptionistCandList') }}">
                                                    {{ __('Add') }}
                                                </a>
                                            </div>
                                        </li>
                                    </div>
                                    <!-- register drop down menu ends-->
                                    <!-- doctor drop down menu -->
                                    <div>    
                                        <li class="nav-item dropdown" style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{"Doctor"}}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ url('/admin/showDoctorList') }}">
                                                    {{ __('Show List') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ url('/admin/showDoctorCandList')}}">
                                                    {{ __('Add') }}
                                                </a>
                                            </div>
                                        </li>
                                    </div>
                                    <div>    
                                        <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                            <a id="navbarDropdown" class="nav-link" href="{{ url('/admin/showPatientList') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{"Patient List"}}
                                            </a>
                                        </li>
                                    </div>
                                    <div>    
                                        <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                            <a id="navbarDropdown" class="nav-link" href="{{ url('/pharmacy/showMediList',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{"Pharmacy"}}
                                            </a>
                                        </li>
                                    </div>
                                    <div>    
                                        <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/showCart',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{"Cart"}}
                                            </a>
                                        </li>
                                    </div>
                                </div>
                                
                        @endif
                        <!-- receptionist exclusive dashboard nav parts-->
                        @if (Auth::User()->role=="r")
                            <div class="container">
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Home"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/receptionist/showRoomList',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Book Room"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/receptionist/showAmbuList',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Book Ambulance"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/receptionist/showPatientList') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Patient List"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/pharmacy/showMediList',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Pharmacy"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/showCart',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Cart"}}
                                        </a>
                                    </li>
                                </div>
                                
                            </div>
                        @endif
                        @if (Auth::User()->role=="p")
                            
                            <div class="container">
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Home"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/doctors') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{"Doctors"}}
                                    </a>
                                </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/showAppointmentList',$filterBy='All') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Appointment"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                        <a id="navbarDropdown" class="nav-link" href="{{ url('/pharmacy/showMediList',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Pharmacy"}}
                                        </a>
                                    </li>
                                </div>
                                <div>    
                                    <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/showCart',$sortBy='Default') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{"Cart"}}
                                        </a>
                                    </li>
                                </div>
                                
                            </div>
                        @endif
                    @else
                        <div class="container">
                            <div>    
                                <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/')}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{"Home"}}
                                    </a>
                                </li>
                            </div>
                            <div>    
                                <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/doctors') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{"Doctors"}}
                                    </a>
                                </li>
                            </div>
                            <div>    
                                <li style="list-style: none; float: left; padding-left: 40px"> <!--list-syle=none cz to remove the dot which appears before the menu name -->
                                    <a id="navbarDropdown" class="nav-link" href="{{ url('/contacts') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{"Contacts"}}
                                    </a>
                                </li>
                            </div>
                            
                        </div>
                        
                    @endif
                    <!-- end -->
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item" >
                                        <a class="nav-link" href="{{ route('login') }}" style="color:black">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}" style="color:black">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{url('/profile')}}">
                                            {{ __('Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{url('/home')}}">
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
                
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <!-- footer portion of code -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col" style="padding-left: 50px">
                        <h4>Hospital</h4>
                        <ul>
                            <li><a href="#">our services</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">affiliate program</a></li>
                        </ul>
                    </div>
                    <div class="footer-col" style="padding-left: 130px">
                        <h4>get help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="{{ url('/pharmacy/showMediList',$sortBy='Default') }}">Pharmacy</a></li>
                            <li><a href="{{ url('/showAppointmentList',$filterBy='All') }}">Appointments</a></li>
                            <li><a href="{{ url('/receptionist/showRoomList',$sortBy='Default') }}">Hospital Room Booking</a></li>
                        </ul>
                    </div>

                    <div class="footer-col" style="padding-left: 140px">
                        <h4>follow us</h4>
                        <div class="social-links">
                            <a href="www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>

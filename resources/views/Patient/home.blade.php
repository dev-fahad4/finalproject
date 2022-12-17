@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center"><h4><b>Welcome {{ __(Auth::User()->name) }}</b></h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <h5><u><b>Announcements:</b></u></h5>
                        <div style="display:flex;flex-direction:row">
                            <h4 style="color:red">1.</h4>
                            <h4 style="color:red"> Congratulations to our head of surgical department <b>Dr. Audrey Lim</b> for operating successfully for <b>malignant brain tumor</b> on our <b>PM Sekh Hasina.</b> </h4>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5>2.</h5>
                            <h5> New <b>CAT Scan 13/20 slice Digital Imaging </b> machine have arrived in our hospital.</h5>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5 style="color:red">3.</h5>
                            <h5  style="color:red"> <b>X-ray of mandibular joint </b> currently is not available due to maintainance. Sorry for the inconvinience.</h5>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5 >4.</h5>
                            <h5> We are lucky to have <b>"Dr. Shawn Murphy"</b>, a talented and widely known surgeon, joining our hospital.</h5>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5 >5.</h5>
                            <h5> <b>Congratulations</b> to <b>"Dr. A. Glassman"</b> for being appoinyted as the new <b>president</b> of our hospital.</h5>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5 >6.</h5>
                            <h5> Our pharmacy has been restocked.</h5>
                        </div>
                        
                        <h5 style="padding-top:10px"><u><b>Offers:</b></u></h5>
                        
                        <div style="display:flex;flex-direction:row">
                            <h5>1.</h5>
                            <h5> Get upto <b>10% discount</b> on <b>CAT Scan 13/20 slice Digital Imaging</b> </h5>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5>2.</h5>
                            <h5> Get free checkups from <b>Dr. Shawn Murphy</b> within next 5 days. [once per patient] <br> (From 20th of August till 25th of August)</h5>
                        </div>
                        <div style="display:flex;flex-direction:row">
                            <h5>3.</h5>
                            <h5> Get upto <b>5% discount</b> on <b>Dr. Shawn Murphy's visits.</b> </h5>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


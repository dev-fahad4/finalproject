@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" Style="text-align:center">{{ __('Room Booking Form') }}</div>

                <div class="card-body">
                    <form method="GET" action="/receptionist/selectPatientforRoomBooking/bookingForm">
                        @csrf

                        <div class="row mb-3">
                            <label for="room_number" class="col-md-4 col-form-label text-md-end">{{ __('Room Number') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="room_number" name="room_number" value="<?=$room_id?>" class="form-control" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="p_id" class="col-md-4 col-form-label text-md-end">{{ __('Patient ID') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="p_id" name="p_id" value="<?=$patientData->id?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" id="name" name="name" value="<?=$patientData->name?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input  type="text" id="email" name="email" value="<?=$patientData->email?>" class="form-control" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                @if ($patientData->contact_number != Null)
                                    <input type="tel" id="contact" name="contact" value="<?=$patientData->contact_number?>" class="form-control" required>
                                @else
                                    <input type="tel" id="contact" name="contact" class="form-control" autofocus required>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Booking Date" class="col-md-4 col-form-label text-md-end">{{ __('Booking Date') }}</label>

                            <div class="col-md-3">
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-0" align="center" >
                            <div>
                                <button type="button" class="btn btn-primary">
                                    <a class="nav-link" href="{{ url('/receptionist/showRoomList',$sortBy='Default') }}" >
                                        {{"Cancel"}}
                                    </a>
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                                <button type="button" class="btn btn-primary">
                                    <a class="nav-link" href="{{url('/receptionist/bookRoom',[$room_id,$sortBy='Default'])}}" >
                                        {{"Back"}}
                                    </a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" Style="text-align:center"><h3><b>{{ __('Profile') }}</b></h3></div>

                <div class="card-body">
                    <form method="GET" action="/profile/update">
                        @csrf

                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('User ID') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="id" name="id" value="<?=$userData->id?>" class="form-control" required disabled>
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Privilege') }}</label>

                            <div class="col-md-6">
                                @if($userData->role == "a")
                                    <input  type="text" id="role" name="role" value="Admin" class="form-control" required disabled>
                                @elseif($userData->role == "r")
                                    <input  type="text" id="role" name="role" value="Receptionist" class="form-control" required disabled>
                                @else
                                    <input  type="text" id="role" name="role" value="Patient" class="form-control" required disabled>
                                @endif
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="name" name="name" value="<?=$userData->name?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="email" name="email" value="<?=$userData->email?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                @if ($userData->contact_number != Null)
                                    <input type="tel" id="contact" name="contact" value="<?=$userData->contact_number?>" class="form-control" required>
                                @else
                                    <input type="tel" id="contact" name="contact" class="form-control" autofocus required>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                @if ($userData->address != 'none')
                                    <input type="text" id="address" name="address" value="<?=$userData->address?>" class="form-control" required>
                                @else
                                    <input type="text" id="address" name="address" class="form-control" autofocus required>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input type="password" id="password" name="password" value="<?=$userData->address?>" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-0" align="center" >
                            <div>
                                <button type="button" class="btn btn-primary">
                                    <a class="nav-link" href="{{ url('/home') }}" >
                                        {{"Cancel"}}
                                    </a>
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
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


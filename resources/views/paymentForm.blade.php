@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" Style="text-align:center">{{ __('Payment') }}</div>

                <div class="card-body">
                    <form method="GET" action="/paymentDone">
                        @csrf

                        <div class="row mb-3">
                            <label for="p_id" class="col-md-4 col-form-label text-md-end">{{ __('User ID') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="u_id" name="u_id" value="<?=$userData->id?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" id="name" name="name" value="<?=$userData->name?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input  type="text" id="email" name="email" value="<?=$userData->email?>" class="form-control" required>

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
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Total Amount') }}</label>

                            <div class="col-md-6">
                                <input type="tel" id="amount" name="amount" value="<?=$total?>  Taka" class="form-control" required disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="card_number" class="col-md-4 col-form-label text-md-end">{{ __('Card Number') }}</label>

                            <div class="col-md-6">
                                <input  type="text" id="card_number" name="card_number" class="form-control" required>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pin" class="col-md-4 col-form-label text-md-end">{{ __('PIN') }}</label>

                            <div class="col-md-6">
                                <input  type="password" id="pin" name="pin" class="form-control" required>

                            </div>
                        </div>

                        <div class="row mb-0" align="center" >
                            <div>
                                <button type="button" class="btn btn-primary">
                                    <a class="nav-link" href="{{ url('/showCart',$shortBy='Default') }}" >
                                        {{"Cancel"}}
                                    </a>
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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


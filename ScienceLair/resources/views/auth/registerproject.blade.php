@extends('layouts.appadmin')

@section('content')

<head>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
 
 
<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

{!! $calendar_details->script() !!}

</head>

<div class="container"
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Registrar nuevo proyecto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerproject') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Código de proyecto') }}</label>

                            <div class="col-md-3">
                                <input id="code" type="text" class="form-control @error('name') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="name" autofocus>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Estado del proyecto') }}</label>

                            <div class="col-md-3">
                                <select name="state" class="form-control">
                                    <option>EN EJECUCIÓN</option>
                                    <option>FINALIZADO</option>
                                    <option>CANCELADO</option>
                                </select>
                            </div>

                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Fecha de incio') }}</label>

                            <div class="col-md-3">
                                <input type="text" class="form-control datepicker" name="date">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

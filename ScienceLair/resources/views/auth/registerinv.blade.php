
@php
    use Illuminate\Support\Facades\DB;
    $couunis = DB::table('country_units')->get();
    $cu = [];
    $user_type = Auth::user()->user_type;
@endphp

@extends($user_type == 'INVESTIGADOR'? 'layouts.app' : 'layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Registrar nuevo investigador') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerinv') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nombres') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-4">
                                <input id="secondname" type="text" class="form-control @error('name') is-invalid @enderror" name="secondname" value="{{ old('secondname') }}" required autocomplete="name" autofocus>

                                @error('secondname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Número de pasaporte') }}</label>

                            <div class="col-md-4">
                                <input id="passportnumber" type="text" class="form-control @error('name') is-invalid @enderror" name="passportnumber" value="{{ old('passportnumber') }}" required autocomplete="name" autofocus>

                                @error('passportnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-2">
                                <select name="state" class="form-control">
                                    <option>ACTIVO</option>
                                    <option>INACTIVO</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Unidad correspondiente') }}</label>

                            <div class="col-md-6">
                                <select name="associatedunit" class="form-control">
                                @foreach($couunis as $couuni)
                                    @if(!in_array($couuni->unit, $cu))
                                        @php
                                            $cu[] = $couuni->unit;
                                        @endphp
                                    @endif
                                @endforeach
                                @foreach($cu as $c)
                                    <option>{{$c}}</option>>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar investigador') }}
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

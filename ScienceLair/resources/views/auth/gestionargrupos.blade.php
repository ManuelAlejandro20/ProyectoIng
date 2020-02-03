@extends('layouts.appadmin')

@section('content')
@php

@endphp
<div class="container" style="margin-bottom:30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Añadir nuevo grupo') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('gestionargrupos') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                             <div class="col-md-6 ">
                                
                                 <input type="file" name="select_file"/>
                                 <span class="text-muted">jpg, png</span>                                 

                            
                                @error('select_file')
                                    <span class="help-block" role="alert">
                                         <strong><p style="color:#cb3e49;">{{ $message }}</p></strong>
                                    </span>
                                @enderror 
                            
                                
                            </div> 
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <table class="table table-striped">
                                    <thead class="alert alert-info">
                                            <th style="text-align:center">Unidad asociada</th>
                                            <th style="text-align:center">País</th>
                                            <th style="text-align:center"><a href="#" class="btn btn-info addRow">+</a></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input id="unidad" type="text" class="form-control @error('name') is-invalid @enderror" name="unidades[]" value="{{ old('unidades.0')}}" required autocomplete="name" autofocus></td>

                                            <td><input id="pais" type="text" class="form-control @error('name') is-invalid @enderror" name="paises[]" value="{{ old('paises.0') }}" required autocomplete="name" autofocus></td>
                                            <td style="text-align:center"> </td>
                                        </tr>
                                    </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                        <script type = "text/javascript">
                            $('.addRow').on('click', function(){
                                addRow();
                                return false;
                            });

                            function addRow(){
                                var tr = '<tr>' +
                                            '<td><input id="unidad" type="text" class="form-control @error('name') is-invalid @enderror" name="unidades[]" required autocomplete="name" autofocus></td>' +
                                            '<td><input id="pais" type="text" class="form-control @error('name') is-invalid @enderror" name="paises[]" required autocomplete="name" autofocus></td>' +
                                            '<td style="text-align:center"><a href="#" class="btn btn-danger remove">-</a></td>'+
                                        '</tr>';
                                    $('tbody').append(tr);
                            };

                            $('tbody').on('click', '.remove', function(){
                                $(this).parent().parent().remove();
                                return false;
                            });


                        </script>

                        @if(count($errors) > 0)
                                    <php>
                                    @for ($x = 1; $x < count(Session::get('uni')); $x++)
                                        <script type="text/javascript">
                                                var tr = '<tr>' +
                                                            '<td><input id="unidad" type="text" class="form-control @error('name') is-invalid @enderror" name="unidades[]" required autocomplete="name" value="{{session()->get('uni')[$x]}}"autofocus ></td>' +
                                                            
                                                            '<td><input id="pais" type="text" class="form-control @error('name') is-invalid @enderror" name="paises[]" required autocomplete="name" value="{{session()->get('pai')[$x]}}"autofocus></td>' +

                                                            '<td style="text-align:center"><a href="#" class="btn btn-danger remove">-</a></td>'+
                                                        '</tr>';
                                                    $('tbody').append(tr);                                            
                                        </script>
                                        
                                    @endfor
                                    </php >
                        @endif



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Añadir nuevo grupo') }}
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

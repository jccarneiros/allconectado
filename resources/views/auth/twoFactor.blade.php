@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <p class="alert alert-info">
                                {{ session()->get('message') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('verify.store') }}">
                            {{ csrf_field() }}
                            <h1>Verificação de dois fatores</h1>
                            <p class="text-muted">
                                Você recebeu um e-mail que contém um código de login de dois fatores.
                                Se você não recebeu, pressione <a href="{{ route('verify.resend') }}">aqui</a>.
                            </p>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
{{--                                <span class="input-group-text"><i class="fa fa-lock"></i></span>--}}
                                </div>
                                <input name="two_factor_code" type="text" class="form-control form-control-sm{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Código de dois fatores" autocomplete="off">
                                @if($errors->has('two_factor_code'))
                                    <div class="invalid-feedback">{{ $errors->first('two_factor_code') }}</div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                                    <button type="submit" class="btn btn-sm btn-primary px-4 w-100">Verificar</button>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3 text-right">
                                    <a class="btn btn-sm btn-danger px-4 w-100" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        {{ trans('Sair') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection

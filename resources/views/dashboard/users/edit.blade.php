@extends('layouts.master')
@section('title', 'Usuário')

@section('content')
    <div class="card">
        <div class="container">
            <h5 class="card-title" style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">Editar usuário: {{$item->name}}</h5>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
                    <a href="{{route('dashboard.users.index')}}" class="btn btn-sm btn-secondary w-100">
                        Voltar
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
                    <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary w-100">
                        Painel
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div id="spinner" class="text-center" style="vertical-align: middle"></div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form action="{{route('dashboard.users.update', $item->id)}}" method="POST" id="form"
                              enctype="multipart/form-data">
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-3">
                                    <input type="text" name="name"
                                           class="form-control form-control-sm @error('name') is-invalid @enderror"
                                           placeholder="digite um nome"
                                           value="{{$item->name, old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-3">
                                    <input type="email" name="email"
                                           class="form-control form-control-sm @error('email') is-invalid @enderror"
                                           placeholder="digite um e-mail"
                                           value="{{$item->email, old('email') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                                    <button type="submit" class="btn btn-success btn-sm w-100 btn-submit">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                            @include('dashboard.users.partials._roles_edit', ['item' => $item])
                            @include('dashboard.users.partials._permissions_edit', ['item' => $item])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush

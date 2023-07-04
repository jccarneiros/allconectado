@extends('layouts.master')
@section('title', 'Painel')

@section('content')
    <div class="container">
        <div class="row">
            {{--            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-3">
                <a href="{{route('dashboard.users.index')}}" class="btn btn-sm btn-primary w-100">
                    Usuários
                </a>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-3">
                <a href="{{route('dashboard.roles.index')}}" class="btn btn-sm btn-primary w-100">
                    Grupos
                </a>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-3">
                @can('configurations.edit')
                    <a href="{{route('dashboard.configurations.index', $siteInfo->id)}}" class="btn btn-sm btn-warning w-100">
                        Configurações
                    </a>
                @endcan
            </div>
            {{--            </div>--}}
        </div>
    </div>
@endsection

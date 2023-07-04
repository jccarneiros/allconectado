@extends('layouts.master')
@section('title', 'Grupos')

@section('content')
    <div class="card">
        <div class="container">
            <h5 class="card-title" style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">Grupos</h5>
            @can('roles.create')
                <form action="{{route('dashboard.roles.store')}}" method="POST" id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-3">
                            <input type="text" name="name"
                                   class="form-control form-control-sm @error('name') is-invalid @enderror"
                                   placeholder="digite um nome para o grupo" value="{{old('name') }}" autocomplete="off">
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                            <button type="submit" class="btn btn-success btn-sm btn-submit w-100">Salvar</button>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                            <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary w-100">Painel</a>
                        </div>
                    </div>
                </form>
            @endcan
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 1rem !important;">#</th>
                                    <th scope="col">Nome do grupo</th>
                                    <th scope="col" style="width: 2rem !important;" class="text-center">Editar</th>
                                    <th scope="col" style="width: 2rem !important;" class="text-center">Excluír</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <th scope="row" class="text-center">{{$item->id}}</th>
                                        <td class="text-truncate">{{$item->name}}</td>
                                        <td class="text-center">
                                            @can('roles.edit')
                                                <a href="{{route('dashboard.roles.edit', $item->id)}}"
                                                   class="btn btn-sm btn-warning">
                                                    Editar
                                                </a>
                                            @endcan
                                        </td>
                                        <td class="text-center">
                                            @can('roles.delete')
                                                <a data-bs-toggle="modal"
                                                   data-bs-target="#{{ 'modal_Destroy_Role' . $item->id }}"
                                                   class="btn btn-sm btn-danger">
                                                    Excluir
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @include('dashboard.roles.modals.destroy', ['item' => $item])
                                @empty


                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

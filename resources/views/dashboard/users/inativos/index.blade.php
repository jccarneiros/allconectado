@extends('layouts.master')
@section('title', 'Usuários Inativos')

@section('content')
    @can('users.onlyTrashed')
        <div class="card">
            <div class="container">
                <h5 class="card-title" style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">Usuários inativados</h5>
                <div class="card-body">
                    <form method="POST" action="{{route('dashboard.users.forceDelete')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-3">
                                <a href="{{route('dashboard.users.index')}}" class="btn btn-sm btn-secondary w-100">
                                    Voltar
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-3">
                                <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary w-100">
                                    Painel
                                </a>
                            </div>
                            @can('users.forceDelete')
                                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                                    <a data-bs-toggle="modal"
                                       data-bs-target="#{{ 'modal_Delete_Users'}}"
                                       class="btn btn-sm btn-danger w-100">
                                        Excluir
                                    </a>
                                    @include('dashboard.users.modals.delete')
                                </div>
                            @endcan
                        </div>
                        <div class="table-responsive">
                            <table id="tableIndex" class="table table-hover table-sm table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th style="width: 1rem">
                                        <label class="control control--checkbox">
                                            <input type="checkbox" id="ckAll"/>
                                            <span class="control__indicator chk"></span>
                                        </label>
                                    </th>
                                    <th class="text-truncate">Nome</th>
                                    <th class="text-truncate">Email</th>
                                    <th class="text-truncate" style="width: 5rem">Data</th>
                                    <th class="text-center" style="width: 5rem">Restaurar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td class="text-center">
                                            <label class="control control--checkbox">
                                                <input name="delete[]" value="{{$item->id}}" type="checkbox"
                                                       class="chk"/>
                                                <span class="control__indicator chk"></span>
                                            </label>
                                        </td>
                                        <td class="text-truncate">{{$item->name}}</td>
                                        <td class="text-truncate">{{$item->email}}</td>
                                        <td class="text-truncate">{{Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                        @can('users.restore')
                                            <td class="text-truncate text-center">
                                                <a data-bs-toggle="modal"
                                                   data-bs-target="#{{ 'modal_Restore_User' . $item->id }}"
                                                   class="btn btn-sm btn-warning w-100">
                                                    Ativar
                                                </a>
                                            </td>
                                        @endcan
                                    </tr>
                                    @include('dashboard.users.modals.restore', ['item' => $item])
                                @empty
                                    <h5>Nenhum registro encontrado</h5>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="container d-print-none">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="d-flex justify-content-end">
                                            @if(isset($dataForm))
                                                {!! $data->appends($dataForm)->links() !!}
                                            @else
                                                {!! $data->links() !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#ckAll").click(function () {  // minha chk que marcará as outras
                if ($("#ckAll").prop("checked"))   // se ela estiver marcada...
                    $(".chk").prop("checked", true);  // as que estiverem nessa classe ".chk" tambem serão marcadas
                else $(".chk").prop("checked", false);   // se não, elas tambem serão desmarcadas
            });
        });
    </script>
@endpush

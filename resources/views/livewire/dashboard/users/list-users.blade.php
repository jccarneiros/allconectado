<div>


    <div class="card">
        <div class="container">
            <h5 class="card-title" style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">Usuários</h5>
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-3">
                    <input type="text" wire:model="search" class="form-control form-control-sm"
                           placeholder="digite um nome para pesquisar" autocomplete="off">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                    @can('users.create')
                        <a href="{{route('dashboard.users.create')}}" class="btn btn-sm btn-success w-100">Novo</a>
                    @endcan
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                    @can('users.onlyTrashed')
                        <a href="{{route('dashboard.users.onlyTrashed')}}"
                           class="btn btn-sm btn-info w-100">Inativos</a>
                    @endcan
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mb-3">
                    <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary w-100">
                        Painel
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 1rem !important;">#</th>
                                    <th scope="col">Nome do usuário</th>
                                    <th scope="col">E-mail do usuário</th>
                                    <th scope="col">Grupo</th>
                                    <th scope="col" style="width: 2rem !important;" class="text-center">Editar</th>
                                    <th scope="col" style="width: 2rem !important;" class="text-center">Inativar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <th scope="row" class="text-center">{{$item->id}}</th>
                                        <td class="text-truncate">{{$item->name}}</td>
                                        <td class="text-truncate">{{$item->email}}</td>
                                        <td>
                                            @foreach($item->roles as $role)
                                                {{$role->name}} /
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @if($item->is_super_user == 0)
                                                @can('users.edit')
                                                    <a href="{{route('dashboard.users.edit', $item->id)}}"
                                                       class="btn btn-sm btn-warning">
                                                        Editar
                                                    </a>
                                                @endcan
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($item->is_super_user == 0)
                                                @can('users.delete')
                                                    <a data-bs-toggle="modal"
                                                       data-bs-target="#{{ 'modal_Destroy_User' . $item->id }}"
                                                       class="btn btn-sm btn-danger">
                                                        Inativar
                                                    </a>
                                                @endcan
                                            @endif
                                        </td>

                                    </tr>
                                    @include('dashboard.users.modals.destroy', ['item' => $item])
                                @empty


                                @endforelse
                                </tbody>
                            </table>
                            <div class="container-fluid d-print-none text-center">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="d-flex justify-content-end">
                                            @if(isset($data))
                                                {!! $data->appends(Request::all())->links() !!}
                                            @else
                                                {!! $data->links() !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

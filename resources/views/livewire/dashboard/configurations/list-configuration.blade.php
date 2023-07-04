<div>
    <div class="container mt-3">
        <div class="row">
            <h4 style="border-left: 5px solid #aa00ff;background-color: #f5f5f5;width: 100%;padding: 2px 0px 5px 10px;">Dados de Configuração da
                plataforma</h4>
            <hr>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <form action="">
                    <input type="hidden" wire:model="item_id">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover">
                        <tr>
                            <th>Nome:</th>
                            <td  colspan="3">
                                <input type="text" name="app_name" wire:model="app_name" class="form-control form-control-sm">
                                @error('app_name') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>E-mail:</th>
                            <td  colspan="3">
                                <input type="email" name="app_email" wire:model="app_email" class="form-control form-control-sm">
                                @error('app_email') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>CEP:</th>
                            <td  colspan="3">
                                <input type="text" name="app_cep" wire:model="app_cep" class="form-control form-control-sm">
                                @error('app_cep') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Endereço:</th>
                            <td  colspan="3">
                                <input type="text" name="app_endereco" wire:model="app_endereco" class="form-control form-control-sm">
                                @error('app_endereco') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Nº:</th>
                            <td  colspan="3">
                                <input type="text" name="app_numero" wire:model="app_numero" class="form-control form-control-sm">
                                @error('app_numero') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Bairro:</th>
                            <td  colspan="3">
                                <input type="text" name="app_bairro" wire:model="app_bairro" class="form-control form-control-sm">
                                @error('app_bairro') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Cidade:</th>
                            <td  colspan="3">
                                <input type="text" name="app_cidade" wire:model="app_cidade" class="form-control form-control-sm">
                                @error('app_bairro') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td  colspan="3">
                                <input type="text" name="app_estado" wire:model="app_estado" class="form-control form-control-sm">
                                @error('app_estado') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Site:</th>
                            <td  colspan="3">
                                <input type="text" name="app_site" wire:model="app_site" class="form-control form-control-sm">
                                @error('app_site') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Telefone:</th>
                            <td  colspan="3">
                                <input type="text" name="app_telefone_um" wire:model="app_telefone_um" class="form-control form-control-sm">
                                @error('app_telefone_um') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Telefone:</th>
                            <td  colspan="3">
                                <input type="text" name="app_telefone_dois" wire:model="app_telefone_dois" class="form-control form-control-sm">
                                @error('app_telefone_dois') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Telefone:</th>
                            <td  colspan="3">
                                <input type="text" name="app_telefone_tres" wire:model="app_telefone_tres" class="form-control form-control-sm">
                                @error('app_telefone_tres') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Autor:</th>
                            <td  colspan="3">
                                <input type="text" name="app_autor" wire:model="app_autor" class="form-control form-control-sm">
                                @error('app_autor') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Link:</th>
                            <td  colspan="3">
                                <input type="text" name="app_url" wire:model="app_url" class="form-control form-control-sm">
                                @error('app_url') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Debug:</th>
                            <td  colspan="3">
                                <select name="app_debug" wire:model="app_debug" class="form-select form-select-sm">
                                    <option value="true">Sim</option>
                                    <option value="false">Não</option>
                                </select>
                                @error('app_debug') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Tipo:</th>
                            <td  colspan="3">
                                <select name="app_env" wire:model="app_env" class="form-select form-select-sm">
                                    <option value="production ">Publicado</option>
                                    <option value="local">Local</option>
                                </select>
                                @error('app_env') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Descrição:</th>
                            <td  colspan="3">
                                <input type="text" name="app_description" wire:model="app_description" class="form-control form-control-sm">
                                @error('app_description') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Tempo de sessão:</th>
                            <td  colspan="3">
                                <select name="session_lifetime" wire:model="session_lifetime" class="form-select form-select-sm">
                                    <option value="60">1 horas</option>
                                    <option value="120">2 horas</option>
                                    <option value="180">6 horas</option>
                                    <option value="1440">24 horas</option>
                                </select>
                                @error('session_lifetime') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Expirar sessão:</th>
                            <td  colspan="3">
                                <select name="session_expire_on_close" wire:model="session_expire_on_close" class="form-select form-select-sm">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                @error('session_expire_on_close') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Criptografar sessão:</th>
                            <td  colspan="3">
                                <select name="session_encrypt" wire:model="session_encrypt" class="form-select form-select-sm">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                @error('session_encrypt') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Habilitar registro de usuário?:</th>
                            <td colspan="3">
                                <select name="app_enable_register" wire:model="app_enable_register" class="form-select form-select-sm">
                                    <option value="1">Sim</option>
                                    <option value="0">Não</option>
                                </select>
                                @error('app_enable_register') <span class="text-danger">{{$message}}</span>@enderror
                            </td>
                        </tr>
                        <tr>
                            <th>Editar</th>
                            <td colspan="3" class="text-end">
                                    <button wire:click.prevent="update()" class="btn btn-sm btn-warning w-100">Editar</button>
                            </td>
                        </tr>

                    </table>
                </div>
                </form>
                <livewire:dashboard.configurations.edit-image-configuration/>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
</div>

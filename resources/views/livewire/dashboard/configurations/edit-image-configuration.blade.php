<div>
    <form action="" enctype="multipart/form-data">
        <input type="hidden" wire:model="item_id">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <tr>
                    <th>Imagem:</th>
                    <td colspan="2">
                        <input type="file" name="app_image" wire:model="app_image" class="form-control form-control-sm image-upload">
                        @error('app_image') <span class="text-danger">{{$message}}</span>@enderror
                    </td>
                    <td style="width: 20rem; height: 15rem; !important;">
                        @if (isset($app_image))
                            <img src="{{url("storage/{$app_image}")}}" style="width: 20rem; height: 15rem; !important;">
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Editar</th>
                    <td colspan="2">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </td>
                    <td> <button wire:click="$emit('refreshComponent')" wire:click.prevent="editImageConfiguration()" class="btn btn-sm btn-warning w-100">Editar</button></td>
                </tr>
            </table>
        </div>
    </form>
</div>

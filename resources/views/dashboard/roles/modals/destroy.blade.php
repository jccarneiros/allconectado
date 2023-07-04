<div id="{{ 'modal_Destroy_Role' . $item->id }}" class="modal fade" data-keyboard="false"
     data-backdrop="static">
    <div class="modal-dialog modal-confirm">
        <form action="{{route('dashboard.roles.destroy', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 text-danger">ATENÇÃO!</h4>
                </div>
                <div class="modal-body text-center">
                    <p>Tem certeza de que deseja excluir esse registro?</p>
                    <p>Este processo não pode ser desfeito.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn-sm">Excluír</button>
                </div>
            </div>
        </form>
    </div>
</div>

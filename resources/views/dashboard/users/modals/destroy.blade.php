<div id="{{ 'modal_Destroy_User' . $item->id }}" class="modal fade" data-keyboard="false"
     data-backdrop="static">
    <div class="modal-dialog modal-confirm">
        <form action="{{route('dashboard.users.destroy', $item->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 text-danger">ATENÇÃO!</h4>
                </div>
                <div class="modal-body text-center">
                    <p>Tem certeza de que deseja inativar esse registro?</p>
                    <p>Este processo poderá ser desfeito na página dos registros inativos.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn-sm">Inativar</button>
                </div>
            </div>
        </form>
    </div>
</div>

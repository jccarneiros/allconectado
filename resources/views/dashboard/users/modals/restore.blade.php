<div id="{{ 'modal_Restore_User' . $item->id }}" class="modal fade" data-keyboard="false"
     data-backdrop="static">
    <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 text-danger">ATENÇÃO!</h4>
                </div>
                <div class="modal-body text-center">
                    <p>Tem certeza de que deseja ativar este registro?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{route('dashboard.users.restore', $item->id) }}"  class="btn btn-warning btn-sm">Ativar</a>
                </div>
            </div>
    </div>
</div>

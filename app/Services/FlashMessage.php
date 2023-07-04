<?php

namespace App\Services;

use RealRashid\SweetAlert\Facades\Alert;

class FlashMessage
{
    public function inactiveSuccess()
    {
        return toast('Registro inativado com sucesso!', 'success')->timerProgressBar();
    }

    public function inactiveError()
    {
        return Alert::error('Erro!', 'Não foi possível inativar o registro!)');
    }

    public function storeMessageSuccess()
    {
        return toast('Registro realizado com sucesso!', 'success')->timerProgressBar();
    }

    public function storeMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível realizar o registro!')->timerProgressBar();
    }

    public function restoreMessageSuccess()
    {
        return toast('Registro ativado com sucesso!', 'success')->timerProgressBar();
    }

    public function restoreMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível ativar o registro!')->timerProgressBar();
    }

    public function updateMessageSuccess()
    {
        return toast('Registro atualizado com sucesso!', 'success')->timerProgressBar();
        //        return alert()->success('Registro atualizado com sucesso!')->toToast()->timerProgressBar();
    }

    public function updateMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível atualizar o registro!')->timerProgressBar();
    }

    public function destroyMessageSuccess()
    {
        return toast('Registro excluído com sucesso!', 'success')->timerProgressBar();
    }

    public function destroyMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível excluído o registro!')->timerProgressBar();
    }

    public function cloneMessageSuccess()
    {
        return toast('Registro duplicado com sucesso!', 'success')->timerProgressBar();
    }

    public function cloneMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível duplicar o registro!')->timerProgressBar();
    }

    public function activeMessageSuccess()
    {
        return toast('Registro ativado com sucesso!', 'success')->timerProgressBar();
    }

    public function activeMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível ativar o registro!')->timerProgressBar();
    }

    public function destroyMessageCommentError()
    {
        return Alert::error('Erro!', 'Não foi possível excluír o registro!')->timerProgressBar();
    }

    public function deleteMessageSuccess()
    {
        return toast('Registro excluído com sucesso!', 'success')->timerProgressBar();
    }

    public function deleteMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível excluído o registro!')->timerProgressBar();
    }

    public function getIdMessageError()
    {
        return Alert::error('Erro!', 'Não foi possível encotrar o registro!')->timerProgressBar();
    }

    public function selectCheckbox()
    {
        return Alert::warning('Atenção!', 'Por favor, selecione um registro!')->timerProgressBar();
    }

    public function selectCheckboxCreateTableConselhos()
    {
        return Alert::warning('Atenção!', 'Por favor, selecione o checkbox!')->timerProgressBar();
    }

    public function studentRemanejadoSuccess()
    {
        return toast('Aluno remanejado com sucesso!', 'success')->timerProgressBar();
    }

    public function studentRemanejadoError()
    {
        return toast('Não foi possível remanejar o aluno!', 'error')->timerProgressBar();
    }
}

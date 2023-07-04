<?php

namespace App\Services;

use App\Models\Backend\Configurations\Configuration;
use Illuminate\Http\Request;

class ConfigurationService
{
    private Configuration $configuration;

    private Request $request;

    private FlashMessage $message;

    public function __construct(Configuration $configuration, Request $request, FlashMessage $message)
    {
        $this->configuration = $configuration;
        $this->request = $request;
        $this->message = $message;
    }

    public function listAll()
    {
        $datas = Configuration::get();

        return $datas;
    }

    public function updateConfiguration(Request $request, $id)
    {
        //Pega todos os dados do formulário
        $dataForm = $request->all();

        //Cria o objeto
        $configuration = $this->configuration->find($id);

        //Altera os dados de registro no banco
        return $configuration->update($dataForm);

    }
}

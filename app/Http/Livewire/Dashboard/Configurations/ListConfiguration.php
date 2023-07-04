<?php

namespace App\Http\Livewire\Dashboard\Configurations;

use App\Models\Dashboard\Configurations\Configuration;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;

class ListConfiguration extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $configuration;

    public $item_id;

    public $app_name;

    public $app_email;

    public $app_cep;

    public $app_endereco;

    public $app_numero;

    public $app_bairro;

    public $app_cidade;

    public $app_estado;

    public $app_site;

    public $app_telefone_um;

    public $app_telefone_dois;

    public $app_telefone_tres;

    public $app_autor;

    public $app_url;

    public $app_debug;

    public $app_env;

    public $app_description;

    public $session_lifetime;

    public $session_expire_on_close;

    public $session_encrypt;

    public $app_enable_register;

    public $updateData = false;

    public function mount($item)
    {
        $this->configuration = $item;
        $this->item_id = $item->id;
        $this->app_name = $item->app_name;
        $this->app_email = $item->app_email;
        $this->app_cep = $item->app_cep;
        $this->app_endereco = $item->app_endereco;
        $this->app_numero = $item->app_numero;
        $this->app_bairro = $item->app_bairro;
        $this->app_cidade = $item->app_cidade;
        $this->app_estado = $item->app_estado;
        $this->app_site = $item->app_site;
        $this->app_telefone_um = $item->app_telefone_um;
        $this->app_telefone_dois = $item->app_telefone_dois;
        $this->app_telefone_tres = $item->app_telefone_tres;
        $this->app_autor = $item->app_autor;
        $this->app_url = $item->app_url;
        $this->app_debug = $item->app_debug;
        $this->app_env = $item->app_env;
        $this->app_description = $item->app_description;
        $this->session_lifetime = $item->session_lifetime;
        $this->session_expire_on_close = $item->session_expire_on_close;
        $this->session_encrypt = $item->session_encrypt;
        $this->app_enable_register = $item->app_enable_register;
    }

    public function render()
    {
        return view('livewire.dashboard.configurations.list-configuration')->layout('layouts.master');
    }

    // Validação
    protected $rules = [
        'app_name' => ['required', 'string'],
        'app_email' => ['required', 'email'],
        'app_cep' => ['required'],
        'app_endereco' => ['required', 'string'],
        'app_numero' => ['required', 'string'],
        'app_bairro' => ['required', 'string'],
        'app_cidade' => ['required', 'string'],
        'app_estado' => ['required', 'string'],
        'app_site' => ['required', 'string'],
        'app_telefone_um' => ['required', 'string'],
        'app_telefone_dois' => ['required', 'string', 'nullable'],
        'app_telefone_tres' => ['required', 'string', 'nullable'],
        'app_autor' => ['required', 'string'],
        //        'app_image' => ['nullable', 'image'],
        'app_url' => ['required', 'string'],
        'app_debug' => ['required', 'string'],
        'app_env' => ['required', 'string'],
        'app_description' => ['required', 'string'],
        'session_lifetime' => ['required', 'string'],
        'session_expire_on_close' => ['required', 'string'],
        'session_encrypt' => ['required', 'string'],
        'app_enable_register' => ['required', 'boolean'],
    ];

    public function rules()
    {
        return [
            'app_name' => ['required', 'string'],
            'app_email' => ['required', 'email'],
            'app_cep' => ['required'],
            'app_endereco' => ['required', 'string'],
            'app_numero' => ['required', 'string'],
            'app_bairro' => ['required', 'string'],
            'app_cidade' => ['required', 'string'],
            'app_estado' => ['required', 'string'],
            'app_site' => ['required', 'string'],
            'app_telefone_um' => ['required', 'string'],
            'app_telefone_dois' => ['required', 'string', 'nullable'],
            'app_telefone_tres' => ['required', 'string', 'nullable'],
            'app_autor' => ['required', 'string'],
            //            'app_image' => ['nullable','image', 'mimes:jpg,jpeg,png,svg,gif|max:2048'],
            'app_url' => ['required', 'string'],
            'app_debug' => ['required', 'string'],
            'app_env' => ['required', 'string'],
            'app_description' => ['required', 'string'],
            'session_lifetime' => ['required', 'string'],
            'session_expire_on_close' => ['required', 'string'],
            'session_encrypt' => ['required', 'string'],
            'app_enable_register' => ['required', 'boolean'],
        ];
    }

    protected $messages = [
        'app_name.required' => 'Digite um nome para a plataforma!',
        'app_email.required' => 'Digite um e-mail para a plataforma!',
        'app_cep.required' => 'Digite um cep para a plataforma!',
        'app_endereco.required' => 'Digite um endereço para a plataforma!',
        'app_numero.required' => 'Digite um número para a plataforma!',
        'app_bairro.required' => 'Digite um bairro para a plataforma!',
        'app_cidade.required' => 'Digite um cidade para a plataforma!',
        'app_estado.required' => 'Digite um Estado para a plataforma!',
        'app_site.required' => 'Digite um site para a plataforma!',
        'app_telefone_um.required' => 'Digite um telefone para a plataforma!',
        'app_autor.required' => 'Digite um autor para a plataforma!',
        'app_url.required' => 'Digite um link para a plataforma!',
        'app_debug.required' => 'Selecione um valor para a plataforma!',
        'app_env.required' => 'Selecione um tipo para a plataforma!',
        'app_description.required' => 'Selecione uma descrição para a plataforma!',
        'session_lifetime.required' => 'Selecione um tempo para a sessão do usuário!',
        'session_expire_on_close.required' => 'Selecione um tempo para a sessão expirar do usuário!',
        'session_encrypt.required' => 'Selecione se a sessão será criptografada!',
        'app_enable_register.required' => 'Selecione um valor para habilitar o registro de novos usuários!',
    ];

    protected $validationAttributes = [
        'app_name' => 'Digite um nome para a plataforma!',
        'app_email' => 'Digite um e-mail para a plataforma!',
        'app_cep' => 'Digite um cep!',
        'app_endereco' => 'Digite um endereço!',
        'app_numero' => 'Digite um número!',
        'app_bairro' => 'Digite um bairro!',
        'app_cidade' => 'Digite um cidade!',
        'app_estado' => 'Digite um Estado!',
        'app_site' => 'Digite um domínio para a plataforma!',
        'app_telefone_um' => 'Digite um telefone para a plataforma!',
        'app_telefone_dois' => 'Digite um telefone para a plataforma!',
        'app_telefone_tres' => 'Digite um telefone para a plataforma!',
        'app_autor' => 'Digite um nome de contato para a plataforma!',
        //        'app_image' => 'Selecione uma imagem para a plataforma!',
        'app_url' => 'Digite um link para a plataforma!',
        'app_debug' => 'Selecione um valor para a plataforma!',
        'app_env' => 'Selecione um tipo para a plataforma!',
        'app_description' => 'Selecione uma descrição para a plataforma!',
        'session_lifetime' => 'Selecione um tempo para a sessão do usuário!',
        'session_expire_on_close' => 'Selecione um tempo para a sessão expirar do usuário!',
        'session_encrypt' => 'Selecione se a sessão será criptografada!',
        'app_enable_register' => 'Selecione um valor para habilitar o registro de novos usuários!',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit($id)
    {
        $item = Configuration::findOrFail($id);
        $this->item_id = $item->id;
        $this->app_name = $item->app_name;
        $this->app_email = $item->app_email;
        $this->app_cep = $item->app_cep;
        $this->app_endereco = $item->app_endereco;
        $this->app_numero = $item->app_numero;
        $this->app_bairro = $item->app_bairro;
        $this->app_cidade = $item->app_cidade;
        $this->app_estado = $item->app_estado;
        $this->app_site = $item->app_site;
        $this->app_telefone_um = $item->app_telefone_um;
        $this->app_telefone_dois = $item->app_telefone_dois;
        $this->app_telefone_tres = $item->app_telefone_tres;
        $this->app_autor = $item->app_autor;
        $this->app_url = $item->app_url;
        $this->app_debug = $item->app_debug;
        $this->app_env = $item->app_env;
        $this->app_description = $item->app_description;
        $this->session_lifetime = $item->session_lifetime;
        $this->session_expire_on_close = $item->session_expire_on_close;
        $this->session_encrypt = $item->session_encrypt;
        $this->app_enable_register = $item->app_enable_register;
        $this->updateData = true;
    }

    public function update()
    {
        // Validação
        $this->validate();

        try {
            // Atualiza Registro
            Configuration::find($this->item_id)->fill([
                'app_name' => $this->app_name,
                'app_email' => $this->app_email,
                'app_cep' => $this->app_cep,
                'app_endereco' => $this->app_endereco,
                'app_numero' => $this->app_numero,
                'app_bairro' => $this->app_bairro,
                'app_cidade' => $this->app_cidade,
                'app_estado' => $this->app_estado,
                'app_site' => $this->app_site,
                'app_telefone_um' => $this->app_telefone_um,
                'app_telefone_dois' => $this->app_telefone_dois,
                'app_telefone_tres' => $this->app_telefone_tres,
                'app_autor' => $this->app_autor,
                'app_url' => $this->app_url,
                'app_debug' => $this->app_debug,
                'app_env' => $this->app_env,
                'app_description' => $this->app_description,
                'session_lifetime' => $this->session_lifetime,
                'session_expire_on_close' => $this->session_expire_on_close,
                'session_encrypt' => $this->session_encrypt,
                'app_enable_register' => $this->app_enable_register,
                //                'app_image' => Storage::put(public_path('/uploads/images/configurations/')),
            ])->save();
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',
                'title' => 'Registro atualizado com sucesso!',
                'text' => '',
            ]);
            // Atualiza somente o componente
            $this->emit('refreshComponent');
        } catch (\Exception $exception) {
            // Set Flash Message
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'warning',
                'title' => 'Não foi possível atualizar o registro!',
                'text' => '',
            ]);
        }
    }
}

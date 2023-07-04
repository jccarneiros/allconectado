<?php

namespace App\Http\Livewire\Dashboard\Configurations;

use App\Models\Dashboard\Configurations\Configuration;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditImageConfiguration extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public $app_image;

    public $item;

    public function mount()
    {
        $this->item = Configuration::select('id', 'app_image')->first();
        $this->app_image = $this->item->app_image;
    }

    public function render()
    {
        return view('livewire.dashboard.configurations.edit-image-configuration');
    }

    protected $rules = [
        'app_image' => 'required|mimes:jpg,jpeg,png|max:2048', // 1MB Max
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function editImageConfiguration()
    {
        if (empty($this->app_image)) {
            return null;
        }

        $this->validate();

        if ($path = $this->app_image->store('upload/configurations/image')) {
            Configuration::find($this->item->id)->fill([
                'app_image' => $path,
            ])->save();
            session()->flash('message', 'Imagem atualizada com sucesso!');
            //            $this->dispatchBrowserEvent('swal:modal', [
            //                'type' => 'success',
            //                'title' => 'Imagem atualizada com sucesso!',
            //                'text' => '',
            //            ]);
            return redirect()->to('/dashboard/configuracoes/1/edit', $this->item->id);
            // Atualiza somente o componente
            //            $this->emit('refreshComponent');
        }

    }
}

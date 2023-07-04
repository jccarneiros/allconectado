<?php

namespace App\Http\Controllers\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\Configurations\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    private $view = 'configurations';

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index($id)
    {
        if ($this->request->user()->cannot('configurations.edit', Configuration::class)) {
            abort(403, 'Ação não autorizada!');
        }
        $item = Configuration::findOrFail($id);

        return view("dashboard.{$this->view}.index", compact('item'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ConfigRepository;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    private $configRepository;
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }
    public function show()
    {

        $config = $this->configRepository->config();

        return view('admin.config.edit', [
            'config' => $config
        ]);
    }



    public function update(Request $request)
    {

        $data = $request->only('id', 'mensagem');


        $config = $this->configRepository->update($data);

        return redirect()->route('config.edit');
    }
}

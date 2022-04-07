<?php

namespace App\Repositories;


use App\Models\Config;
use Illuminate\Support\Facades\DB;

class ConfigRepository
{
    private $model;


    public function __construct(Config $model)
    {
        $this->model = $model;
    }

    public function config()
    {
        $id = 1;
        if (!$config = $this->model::findOrFail($id)->first()) {
            dd('aaaa');
            $this->model::create(['mensagem' => 'Mensagem para whatssap']);
        };
        return $config;
    }

    public function update($data)
    {
        $config = $this->model::find(1);
        $config->mensagem = $data['mensagem'];
        return $config->save();
    }
}

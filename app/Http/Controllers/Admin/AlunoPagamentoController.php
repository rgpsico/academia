<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlunoPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlunoPagamentoController extends Controller
{
    protected $repository;

    public function __construct(AlunoPagamento $repository)
    {
        $this->repository = $repository;
    }


    public function store(Request $request)
    {

        $data = $request->only('user_id', 'aluno_id');
        $alunoId = $data['aluno_id'];
        $data['data_pagamento'] =  date('Y-m-d');
        //$data['data_inicio'] =   date('Y-m-d', strtotime($request->data_inicio . ' + 1 days '));
        $data['data_fim']  = date('Y-m-d', strtotime($request->data_inicio . '+ 30 days'));


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            Storage::disk('public')->put($nameFile, fopen($request->file('image'), 'r+'));
            $data['image_pagamento'] = $nameFile;


        }


        $result = $this->repository->create($data);

        return redirect()
            ->route("profile", $alunoId)
            ->withSuccess("Pagamento realizado com Successo");
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AgendaResponse;
use App\Models\Atividades;
use Illuminate\Http\Request;

class AtividadesControllerApi extends Controller
{

    protected $repository;

    public function __construct(Atividades $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $agenda =  $this->repository->all();
        return $agenda->all();
    }

    public function store(Request $request)
    {
        $agenda = $this->repository->create($request->all());

        return response()->json($agenda, 201);
    }

     public function show($id)
    {
        $agenda = $this->repository->find($id);

        return response()->json($agenda);
    }

    public function update(AgendaFormRequest $request, $id)
    {
        $agenda = $this->repository->findById($id);
         $result = $this->repository->update($request->all(), $id);

        return response()->json($result, 200);
    }

    public function destroy($id)
    {
        if($this->repository->destroy($id)){
            return response()->json(['content' => 'A '.$id.' foi excluida com sucesso', 'status' => 'success'], 200);
        }

        return response()->json(null, 204);
    }


}

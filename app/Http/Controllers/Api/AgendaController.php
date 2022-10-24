<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AgendaFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AgendaResponse;
use App\Models\Agenda;

class AgendaController extends Controller
{

    protected $repository;

    public function __construct(Agenda $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        $agenda =  $this->repository->all();
        return AgendaResponse::collection($agenda)->all();
    }

    public function store(AgendaFormRequest $request)
    {
        $agenda = $this->repository->create($request->all());

        return response()->json($agenda, 201);
    }

     public function show($id)
    {
        $agenda = $this->repository->findById($id);

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

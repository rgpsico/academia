<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AlunosFormRequest;

use App\Http\Controllers\Controller;
use App\Models\Alunos;

class AlunosController extends Controller
{

    protected $repository;

    public function __construct(Alunos $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        $alunos =  $this->repository->all();
        return response()->json($alunos);
    }

    public function store(AlunosFormRequest $request)
    {
        $alunos = $this->repository->create($request->all());

        return response()->json($alunos, 201);
    }

     public function show($id)
    {
        $alunos = $this->repository->findById($id);

        return response()->json($alunos);
    }

    public function update(AlunosFormRequest $request, $id)
    {
        $alunos = $this->repository->findById($id);
         $result = $this->repository->update($request->all(), $id);

        return response()->json($result, 200);
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);

        return response()->json(null, 204);
    }


}

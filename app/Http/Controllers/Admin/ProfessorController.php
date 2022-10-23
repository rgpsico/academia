<?php


namespace App\Http\Controllers\Admin;

use App\Models\Professor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professor::where('tipo','1')->paginate(10);
        $loggedId = intval(Auth::id());

        return view('Admin.professor.index', [
            'professores' => $professores,
            'loggedId' => $loggedId
        ]);
    }

    public function show()
    {
        $professores = Professor::where('tipo','1')->paginate(10);
        $loggedId = intval(Auth::id());

        return view('Admin.professor.index', [
            'professores' => $professores,
            'loggedId' => $loggedId
        ]);
    }


    public function agenda()
    {
        $professores = Professor::where('tipo','1')->paginate(10);
        $loggedId = intval(Auth::id());

        return view('Admin.professor.agenda', [
            'professores' => $professores,
            'loggedId' => $loggedId
        ]);
    }

    public function create()
    {
        return view(
            'admin.professor.create',
            [
                'submit_bottom' => 'Cadastrar'
            ]
        );
    }


    public function store(Request $request)
    {
        $data = $request->all();


        $professores = Professor::create($data);

        return redirect()
        ->route('professor.index')
        ->withSuccess("O Aluno {$request->nome} foi Cadastrado com Successo");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = $this->service->findById($id);
        if ($aluno) {
            return view('admin.professor.edit', [
                'aluno' => $aluno
            ]);
        }
        return redirect()->route('professor.index');
    }

}

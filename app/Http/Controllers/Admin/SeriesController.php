<?php


namespace App\Http\Controllers\Admin;

use App\Models\Series;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::paginate();
        $loggedId = intval(Auth::id());

        return view('Admin.series.index', [
            'series' => $series,
            'loggedId' => $loggedId
        ]);
    }

    public function show()
    {
        $Serieses = Series::where('tipo','1')->paginate(10);
        $loggedId = intval(Auth::id());

        return view('Admin.Series.index', [
            'Serieses' => $Serieses,
            'loggedId' => $loggedId
        ]);
    }


    

    public function create()
    {
        return view(
            'admin.Series.create',
            [
                'submit_bottom' => 'Cadastrar'
            ]
        );
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $series = Series::create($data);

        return redirect()
        ->route('series.index')
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
        $series = Series::find($id);
        if ($series) {
            return view('admin.Series.edit', [
                'series' => $series
            ]);
        }
        return redirect()->route('Series.index');
    }

    public function update(Request $request, $id)
    {
        if (!$serie = Series::find($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        
      

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['imagem'] = $request->file('image')->store('series');
            $serie->avatar  = $data;
        }

        $serie->update($data);
        return redirect()->back();
    }

}

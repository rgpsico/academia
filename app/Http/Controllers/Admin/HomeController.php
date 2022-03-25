<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\article;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function gmail(Request $request)
    {
        $maps = $this->DirectionApi('Barra da tijuca', 'copacabana');
        return view('Admin.gmail', compact('maps'));
    }

    public function index(Request $request)
    {
    }

    public function home()
    {
        $alunos = article::paginate(10);
        return view('Admin.home.index', ['home' => $alunos]);
    }

    public function create()
    {
        $categorias = article::all();
        return view('Admin.home.create', ['categorias' => $categorias]);
    }


    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'body',
            'image',
            'categoria'
        ]);

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['string'],
            'categoria' => ['string', 'max:100']
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('portifolio', $nameFile);
        }

        if ($validator->fails()) {
            return redirect()->route('alunos.create')
                ->withErrors($validator)
                ->withInput();
        }
        $Page = new article;
        $Page->title =  $data['title'];
        $Page->body = $data['body'];
        $Page->categoria  = $data['categoria'];
        $Page->cover  = $nameFile;
        $Page->save();

        return redirect()->route('alunos.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = article::find($id);
        if ($page) {
            return view('admin.alunos.edit', [
                'article' => $page
            ]);
        }
        return redirect()->route('alunos.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
        $page = article::find($id);
        $page->delete();
    }

    public function DirectionApi(string $origins, string $destinations)
    {

        $tokenApi = 'AIzaSyA7qcQHcvwSSO496P_6cW0HNrnZut1Wu6Y';
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json';

        $response = Http::get(
            $url,
            [
                'origins'      => $origins,
                'destinations' => $destinations,
                'key'          => $tokenApi,
                'random'       => random_int(1, 100),
            ],
        );

        $responseData = json_decode($response->getBody()->getContents());

        if (isset($responseData->rows[0]->elements[0]->distance)) {
            return $responseData->rows[0]->elements[0]->distance->value;
        }
    }
}

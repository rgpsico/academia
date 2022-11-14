<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Models\Alunos;
use App\Models\article;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    private $alunos;

    public function __construct(Alunos $alunos)
    {
        $this->alunos  = $alunos;        
    }


   
 
    public function imageupload(Request $request)
    {

        $alunoId = $request->alunoId;

    
        $request->validate([
            'avatarFile' => 'required|image|mimes:jpeg,jpg,png'
        ]);
    
            $ext = $request->avatarFile->extension();
            $imageName = time().'.'.$ext;
    
            if($aluno = $this->alunos::find($alunoId)){

                if($aluno->avatar){
                    unlink(\public_path('media/avatar/'.$aluno->avatar));
                }
              
                $request->avatarFile->move(\public_path('media/avatar'), $imageName);
                
                $aluno->avatar = $imageName;
                $aluno->save();
            }
        
        return [
            'location' => asset('media/avatar/'.$imageName)
        ];

    }

    public function teste(UploadRequest $request, $cep)
    {        
        if (!$this->cepValidate($cep)) {
            return "não foi";
        }
        return "foi";

    }

    public function cepValidate($cep)
    {

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json");
        $result = $this->data = json_decode($response->getBody()->getContents());  
     
        if (isset($result->cep)) {
            return true;
        }    
    }
}

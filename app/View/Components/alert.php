<?php

namespace App\View\Components;

use App\Models\Alunos;
use App\Models\User;
use Illuminate\View\Component;

class Alert extends Component
{
    public $aluno;
    public $id;
    public $class;
    public $style;
    public $name;
    public $width;
    public $height;

    public function __construct(
        Alunos $alunos, $id = null, $class = null, $style = null, $name = null,
                $width = null, $height = null

        )
    {
        $this->alunos = $alunos;
        $this->id = $id;
        $this->class = $class;
        $this->style = $style;
        $this->name = $name;
        $this->width = $width;
    }

    public function getAlunos()
    {
        return $this->alunos::get();
    }



    public function render()
    {
        return view('components.alert',[
            'alunos' =>  $this->getAlunos()
        ]);
    }
}

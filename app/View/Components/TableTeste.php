<?php

namespace App\View\Components;

use App\Models\Alunos;
use Illuminate\View\Component;

class TableTeste extends Component
{
    protected $list;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Alunos $alunos)
    {
        $this->alunos = $alunos;

    }

    public function getAlunos()
    {
        return $this->alunos::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-teste',
                    [
                        'alunos' => $this->getAlunos()
                    ]

    );
    }
}

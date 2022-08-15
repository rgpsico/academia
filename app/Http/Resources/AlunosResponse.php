<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AlunosResponse extends JsonResource
{
    public function toArray($request)
    {
        $data_fim = Carbon::createFromFormat('Y-m-d', $this->pagamento[0]->data_fim ?? '2022-01-01');
        $hoje = Carbon::now();

        return [
            'id' => $this->id ?? '',
            'nome' => $this->nome ?? '',
            'whatssap' => $this->whatssap ?? '',
            'data_fim' => $this->pagamento[0]->data_fim ?? false,
            'statusPG' => $data_fim->gt($hoje) ? 'Em dia' : 'falso',
            'avatar' => $this->avatar ?? '',
            'created_at' => $this->created_at ?? '',
        ];
    }
}

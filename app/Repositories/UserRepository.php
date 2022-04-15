<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    private $model;


    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function All()
    {
        return $this->model::all();
    }
}

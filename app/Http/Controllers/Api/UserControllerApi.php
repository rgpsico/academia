<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserControllerApi extends Controller
{
    private $UserRepository;

    public function __construct(UserRepository $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }
    public function all()
    {

        return $this->UserRepository->all();
    }
}

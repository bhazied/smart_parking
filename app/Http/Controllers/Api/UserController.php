<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\IRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
       return \Response::json($this->userRepository->lists());
        
    }

    public function show($user)
    {
        return \Response::json($this->userRepository->find($user));
    }
}

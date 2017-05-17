<?php

namespace App\Http\Controllers\Api;

use App\app\Model\User;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::json($this->userRepository->lists());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        return Response::json($this->userRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\app\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return Response::json($this->userRepository->find($user->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\app\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }


    /**
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        return Response::json($this->userRepository->update($request->all(), $user->id, 'id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\app\Model\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($this->userRepository->delete($user->id)) {
            return ['status' => true, "message" => "deleted with success"];
        }
        return ['status' => false, "message" => "not deleted"];
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Psy\Util\Json;

class ApiLoginController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
    }

    public function login(Request $request)
    {
        $request->request->add([
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'grant_type' => 'password',
            'username' => $request->username,
            'password' => $request->password,
            'scope' => '*'
        ]);

        $proxy = Request::create('oauth/token', 'POST');
        $response =  Route::dispatch($proxy);
        $currentUser = \App\Model\User::where('email', $request->username)->with('roles')->first();
        $responseAsArray = json_decode($response->getcontent(), true);
        $currentUser =  ['user' => $this->parseUser($currentUser)];
        $endResponse = array_merge($responseAsArray, $currentUser);
        return $endResponse;
    }

    private function parseUser($user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->list_role
        ];
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Repositories\CountryRepository as Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CountryController extends Controller
{
    private $countryRepository;

    public function __construct(Repository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }


    public function index()
    {
        $coutries = $this->countryRepository->with('users')->lists();
        return $coutries;
    }

    public function show($country)
    {
        return \Response::json($this->countryRepository->find($country));
    }

    public function store(Request $request)
    {
        return $this->countryRepository->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->countryRepository->update($request->all(), $id, 'id');
    }

    public function destroy($id)
    {
        if ($this->countryRepository->delete($id)) {
            return ['status' => true, "message" => "deleted with success"];
        }
        return ['status' => false, "message" => "not deleted"];
    }
}

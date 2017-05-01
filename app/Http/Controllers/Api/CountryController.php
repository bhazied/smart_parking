<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\IRepository;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
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
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\countryRequest;
use App\Repositories\CountryRepository as Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * Class CountryController
 * @package App\Http\Controllers\Api
 */
class CountryController extends Controller
{
    /**
     * @var Repository
     */
    private $countryRepository;

    /**
     * CountryController constructor.
     * @param Repository $countryRepository
     */
    public function __construct(Repository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }


    /**
     * @return mixed
     */
    public function index()
    {
        return Response::json($this->countryRepository->with('users')->lists());
    }

    /**
     * @param $country
     * @return mixed
     */
    public function show($country)
    {
        return \Response::json($this->countryRepository->find($country));
    }

    /**
     * @param countryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        return Response::json($this->countryRepository->create($request->all()));
    }

    /**
     * @param countryRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        return Response::json($this->countryRepository->update($request->all(), $id, 'id'));
    }

    /**
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        if ($this->countryRepository->delete($id)) {
            return ['status' => true, "message" => "deleted with success"];
        }
        return ['status' => false, "message" => "not deleted"];
    }
}

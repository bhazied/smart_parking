<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegionRequest;
use App\Repositories\RegionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class RegionController
 * @package App\Http\Controllers\Api
 */
class RegionController extends Controller
{
    /**
     * @var RegionRepository
     */
    private $regionrpository;

    /**
     * RegionController constructor.
     * @param RegionRepository $regionRepository
     */
    public function __construct(RegionRepository $regionRepository)
    {
        $this->regionrpository = $regionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->regionrpository->with('states')->lists();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        return $this->regionrpository->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->regionrpository->with('states')->find($id);
    }

    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, $id)
    {
        return $this->regionrpository->update($request->all(), $id, $this->regionrpository->getModelKeyName());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->regionrpository->delete($id)) {
            return ['status' => true, "message" => "deleted with success"];
        }
        return ['status' => false, "message" => "not deleted"];
    }
}

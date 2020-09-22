<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\Builder;

class AutoSuggestController extends BaseController
{
    public function filter(CityRequest $request)
    {

        //get cities, their longitude and latitude stored in json file located in storage path
        $url =  storage_path('app/public/data/cities.json');
        $datos = file_get_contents($url);
        $data = json_decode($datos, true);


        $results = collect($data)->where("city", $request->input("city"))->all();

        if(!$results){
            return $this->errorResponse('Result not found', []);
        }
            return $this->successResponse('Data successfully retrieved', ($results));

    }
}

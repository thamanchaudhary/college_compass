<?php

namespace App\Http\Controllers;

use App\Models\AccountGeneralInformation;
use App\Models\District;
use App\Models\GeneralLand;
use App\Models\Palika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use Redirect, Response;

class DropdownController extends Controller
{
    function index()
    {
        $data['states'] = DB::table('states')->get();

        return view("dropdown", $data);
    }
    function getDistrict(Request $request)
    {
        $data['district'] = District::where("province_id", $request->province_id)->get(["district_en", "id"]);
        return response()->json($data);
    }
    function getPalika(Request $request)
    {
        $data['palika'] = Palika::where("district_id", $request->district_id)->get(["palika_en", "id"]);
        return Response::json($data);

        // return view("dropdown",$result);
    }
    function getLand(Request $request)
    {
        // dd($request->general_parent_id);
        $data['land'] = DB::table('land_lists')
            ->where('unique_id', '=', $request->unique_id)
            ->get();
        return response()->json($data);
    }



    function getProduct(Request $request)
    {
        $data['product'] = DB::table('products')
            ->where('udhyog_id', '=', $request->udhyog_id)
            ->get();
        return response()->json($data);
    }

    function getAddress(Request $request)
    {
        $data['address'] = DB::table('addresses')
            ->where('city_id', '=', $request->city_id)
            ->get();
        return response()->json($data);
    }
}

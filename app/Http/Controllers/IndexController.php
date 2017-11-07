<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Continent;
use App\Country;
use App\Hotel;

class IndexController extends Controller
{
    public function index(){
		$continents=Continent::all();
		$hotels=Hotel::all();
		return view('index',compact('continents','hotels'));
	}
	public function getCountries($id){
		$countries = \DB::table("countries")
					->where("continent_id",$id)
					->pluck("name","id");
		return json_encode($countries);
	}
	public function getHotels($continentid,$countryid){
		$hotels=Hotel::where('continent_id',$continentid)
			->where('country_id',$countryid)
			->get();
		$data = view('ajax-hotels',compact('hotels'))->render();
		return response()->json(['result'=>$data,'status'=>'success']);
	}
}

<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index()
   {
      $data = City::all();   
      return view('city.index',compact('data'));
   }

   public function addcity(Request $request){

      $data = City::create($request->all());
      return redirect()->route('city.index');
  }

  
  public function update($id)
    {
    	$data = City::find($id);

	    return response()->json([
	      'data' => $data
	    ]);
    }

    public function edit(Request $request, $id)
    {
      City::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'city_name' => $request->city_name,
       ]
      );

      return response()->json([ 'success' => true ]);

    }

  public function delete($id){
      $data = City::find($id);
      $data->delete();
      return redirect()->route('city.index')->with('success', 'Data Berhasil Dihapus');
  }


}
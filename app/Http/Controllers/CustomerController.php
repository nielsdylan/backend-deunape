<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function all() {
        $data = Customer::all();
        return response()->json(["data"=>$data],200);
    }

    public function register(Request $request) {
        $data                   = new Customer();
        $data->name             = $request->name;
        $data->last_names       = $request->last_names;
        $data->document_number  = $request->document_number;
        $data->cell_numer       = $request->cell_numer;
        $data->save();
        return response()->json(["status"=>"Registro éxito", "data"=>$data],200);
    }

    public function search($id) {
        $data = Customer::find($id);
        return response()->json(["data"=>$data],200);
    }

    public function update(Request $request) {
        $data = Customer::find($request->id);
        $data->name             = $request->name;
        $data->last_names       = $request->last_names;
        $data->document_number  = $request->document_number;
        $data->cell_numer       = $request->cell_numer;
        $data->save();
        return response()->json(["status"=>"Se edito con éxito", "data"=>$data],200);
    }

    public function delete($id) {
        $data = Customer::find($id);
        $data->delete();
        return response()->json(["status"=>"Se elimino con éxito"],200);
    }
}

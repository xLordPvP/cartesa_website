<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Richiesta;
use Illuminate\Http\Request\input;

class RichiestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $accepted = Richiesta::all()->where("isAccepted",1);
            $notAccepted = Richiesta::all()->where("isAccepted",0);
            $data = [
                "type" => "index",
                "state" => "sucsess",
                "accepted" => [
                    "numberOfAccepted" => $accepted->count(),
                    "data" => $accepted
                    ],
                "notAccepted" => [
                    "numberOfNotAccepted" => $notAccepted->count(),
                    "data" => $notAccepted
                    ],
            ];
            return view('test', ['data' => $data]);
        }catch(\Exception $e){
            return response()->json([
                "type" => "index",
                "state"=> "failed",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try{

            $data = Richiesta::where('id',$id)->first();
            $data = [
                "type" => "show",
                "state" => "succsess",
                "data" => $data
            ];
            return view('test', ["data"=>$data]);
        }catch(\Exception $e){
            return response()->json([
                "type" => "show",
                "state"=> "failed",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->input();


            return response()->json([
                "type" => "store",
                "status" => "success",
                "data" => [
                    $data,
                ]
            ]);
        } catch(\Exception $e) {
            return response()->json([
                "type" => "store",
                "state"=> "failed",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{

        }catch(\Exception $e){

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

        }catch(\Exception $e){

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $accepted = Request::all()->where("isAccepted",1);
            $notAccepted = Request::all()->where("isAccepted",0);
            $data = [[
                "state" => "sucsess",
                "accepted" => [
                    "numberOfAccepted" => $accepted->count(),
                    "data" => $accepted
                    ],
                "notAccepted" => [
                    "numberOfNotAccepted" => $notAccepted->count(),
                    "data" => $notAccepted
                    ],
            ]];
            return view('test', ['data' => $data]);
        }catch(\Exception $e){
            return response()->json([
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
            return view('test', ['name' => 'Alex']);
        }catch(\Exception $e){

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

        }catch(\Exception $e){

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

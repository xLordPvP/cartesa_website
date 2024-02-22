<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Richiesta;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Email;

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
                "accepted" => [
                    "numberOfAccepted" => $accepted->count(),
                    "data" => $accepted
                    ],
                "notAccepted" => [
                    "numberOfNotAccepted" => $notAccepted->count(),
                    "data" => $notAccepted
                    ],
            ];
            return response()->json(([
                "type" => "index",
                "state" => "sucsess",
                'data' => $data
            ]));
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
            
            return response()->json(([
                "type" => "show",
                "state" => "sucsess",
                'data' => $data
            ]));
            
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
            // Validazione dei dati del form
            $validatedData = $request->validate([
                'email' => 'required|email',
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'telephone' => 'nullable|string|max:20',
                'city' => 'nullable|string|max:255',
                'cap' => 'nullable|string|max:10',
                'description' => 'required|string|max:1024',
                'budget' => 'required|numeric',
            ]);
            $validatedData['user_id'] = 1;
            $validatedData['accepted_at'] = null;
            $validatedData['isAccepted'] = false;


            // Creazione di una nuova richiesta utilizzando i dati validati
            $richiesta = Richiesta::create($validatedData);

            return response()->json([
                "type" => "store",
                "status" => "success",
                "data" => $richiesta
            ]);
        } catch(\Exception $e) {
            return response()->json([
                "type" => "store",
                "state"=> "failed",
                "error" => $e->getMessage(),
                "request" => $request->input()
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
            DB::beginTransaction();
            $data = Richiesta::where('id', $id)->first();
            $data->delete();
            DB::commit();
            
            return response()->json([
                "type" => "store",
                "status" => "success",
                "data" => $data
            ]);
        } catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                "type" => "store",
                "state"=> "failed",
                "error" => $e->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EcoleRequest;
use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{

    public function index()
    {
        $ecoles = Ecole::get();
        return view('admin.ecole.index',['ecoles'=>$ecoles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ecole.form',['ecole'=>new Ecole()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EcoleRequest $request)
    {

       $ecole =  Ecole::create($request->validated());

        return to_route('admin.ecole.index')->with('success','Ecole du nom '.$ecole->libelle.' est ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ecole $ecole)
    {
        return view('admin.ecole.form',['ecole'=>$ecole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EcoleRequest $request, string $id)
    {
        $data = $request->validated();

        Ecole::where('id',(int)$id)->update($data);
       

      
        return to_route('admin.ecole.index')->with('success','Ecole modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ecole $ecole)
    {
        $ecole->delete();
        return to_route('admin.ecole.index')->with('success','Ecole supprimé');
    }

    
}

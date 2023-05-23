<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResolutionRequest;
use App\Models\ResolutionApporter;
use Illuminate\Http\Request;

class ResolutionApportersController extends Controller
{
    public function index()
    {
        $resolutions = ResolutionApporter::get();
        return view('admin.resolution.index',['resolutions'=>$resolutions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resolution.form',['resolution'=>new ResolutionApporter()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResolutionRequest $request)
    {

       $resolution =  ResolutionApporter::create($request->validated());

        return to_route('admin.resolution.index')->with('success','Résolutions apporter '.$resolution->libelle.' est ajouté');
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
    public function edit(ResolutionApporter $resolution)
    {
        return view('admin.resolution.form',['resolution'=>$resolution]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResolutionRequest $request, string $id)
    {
        $data = $request->validated();

        ResolutionApporter::where('id',(int)$id)->update($data);
       

      
        return to_route('admin.resolution.index')->with('success','Résolution modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResolutionApporter $resolution)
    {
        $resolution->delete();
        return to_route('admin.resolution.index')->with('success','Résolution supprimé');
    }

}

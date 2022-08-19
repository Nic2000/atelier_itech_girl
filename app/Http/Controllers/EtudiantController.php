<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**Recuperer tous les etudiants */
        $etudiant = Etudiant::all();
        return view('etudiant.index', compact('etudiant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'addresse' => 'required',
        ]);
        
        Etudiant::create($request->post());
        return redirect()->route('etudiant.index')->with("L'inscription est réussie");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        return view('etudiant.edit',compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Etudiant $etudiant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'addresse' => 'required',
        ]);
        
        $etudiant->fill($request->post())->save();

        return redirect()->route('etudiant.index')->with('success','La modification  est réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success','La suppression est réussie');
    }
}

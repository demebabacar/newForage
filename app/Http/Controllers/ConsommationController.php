<?php

namespace App\Http\Controllers;

use App\Consommation;
use Illuminate\Http\Request;

class ConsommationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list(Abonnement $abonnement=null){
   
        if($abonnement==null){
            $consommations=\App\Consommation::with('compteur.abonnement.client.user')->get();
            return DataTables::of($consommations)->make(true);
        }else{
            $consommations=$abonnement->compteur->consommations->load('compteur.abonnement.client.user');
            return DataTables::of($consommations)->make(true);
        }
    }   





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consommation  $consommation
     * @return \Illuminate\Http\Response
     */
    public function show(Consommation $consommation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consommation  $consommation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consommation $consommation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consommation  $consommation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consommation $consommation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consommation  $consommation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consommation $consommation)
    {
        //
    }
}

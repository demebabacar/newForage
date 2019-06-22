<?php

namespace App\Http\Controllers;

use App\abonnements;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list(Request $request)
    {
        $clients=Client::with('user')->get();
        return Datatables::of($clients)->make(true);
    }

    public function index()
    {
        //
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {
        //
        // $this->validate(
        //     $request, [
        //         'village' => 'required|exists:villages,id',
        //     ]);
        $village_id=$request->input('village');
        $village=\App\Village::find($village_id);
        return view('clients.create',compact('village'));
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
        $this->validate(
            $request, [
                'nom' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|max:50',
                'village' => 'required|exists:villages,id',
            ]
        );
        return view('clients.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function show(abonnements $abonnements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function edit(abonnements $abonnements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, abonnements $abonnements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function destroy(abonnements $abonnements)
    {
        //
    }
}

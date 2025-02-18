<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::with("Companis")->with("phoneNumber")->get();
        // return $users;

        foreach($users as $user){
            echo $user->name . " - ";
            echo $user->Companis?->company_name . " - ";
            echo $user->phoneNumber?->number . "</br>";
            echo "<hr>";
        }

        // for find one item
        // echo $users->name . " - ";
        // echo $users->Companis->company_name . " - ";
        // echo $users->phoneNumber->number . "</br>";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

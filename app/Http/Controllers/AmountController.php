<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmountRequest;
use App\Http\Requests\UpdateAmountRequest;
use App\Models\Intranet\Amount;

class AmountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAmountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Amount $amount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amount $amount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAmountRequest $request, Amount $amount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amount $amount)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Salarie;
use App\Employee;
use Illuminate\Http\Request;

class SalarieApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Salarie::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Employee::find($request['emp_no'])->salary->update(['to_date' => now()]);
        return Salarie::create($request->all(), ['from_date' => now(), 'to_date' => '9999-01-01']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function show(Salarie $salarie)
    {
        return $salarie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salarie $salarie)
    {
        $salarie->update($request->all());
        return $salarie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salarie  $salarie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salarie $salarie)
    {
        $s = $salarie;
        $salarie->delete();
        return $s;
    }
}

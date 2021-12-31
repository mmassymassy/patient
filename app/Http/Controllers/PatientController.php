<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientInfoResource;
use App\Http\Requests\CreatePatientRequest;



class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }
    public function getPatientInfo($id){
        $patient = Patient::where('id',$id)->get();
        return PatientInfoResource::collection($patient);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePatientRequest $request)
    {

        Patient::create([$request->all(), 'date' => date('Y-m-d')]);
        return [
            'status' => 400,
            'message' => 'Patient ajouté avec succés'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $patient->update([$request->all());
        return [
            'status' => 400,
            'message' => 'Patient modifié avec succés'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return [
            'status' => 400,
            'message' => 'Patient supprimé avec succés'
        ];
    }
}

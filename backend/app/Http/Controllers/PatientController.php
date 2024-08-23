<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{

    use HttpResponse;

    public function index()
    {
        return Patient::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'atended' => 'nullable|max:1',
        ]);

        if ($validator->fails()) {
            return $this->error('Some data is not correct', 400, $validator->errors());
        }

        $created = Patient::create($validator->validated());

        if ($created) {
            return $this->response('Patient created', 201, $validator->validated());
        }

        return $this->error('Patient not created', 400);
    }

    public function show(Patient $patient)
    {
        if ($patient) {
            return $this->response('Patient found', 200, $patient);
        }

        return $this->error('Patient not found', 404);
    }

    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|string',
            'cpf' => 'required|numeric|size:11',
        ]);

        if ($validator->fails()) {
            return $this->error('Some data is not correct', 400, $validator->errors());
        }

        $updated = $patient->update($validator->validated());

        if ($updated) {
            return $this->response('Patient updated', 200, $validator->validated());
        }

        return $this->error('Patient not updated', 400);
    }

    public function destroy(string $patient)
    {
        $patient = Patient::find($patient);

        if ($patient) {
            $deleted = $patient->delete();

            if ($deleted) {
                return $this->response('Patient deleted', 200);
            }
        }

        return $this->error('Patient not found', 404);
    }
}

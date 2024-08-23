<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use HttpResponse;

    public function index()
    {
        return User::with('patients')->get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'cpf' => 'required|max:11',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Some data is not correct', 400, $validator->errors());
        }

        $created = User::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'cpf' => $request['cpf'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if ($created) {
            return $this->response('User created', 201, $validator->validated());
        }

        return $this->error('User not created', 400);
    }

    public function show(User $user)
    {
        if ($user) {
            return $this->response('User found', 200, $user->load('patients'));
        }

        return $this->error('Patient not found', 404);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'cpf' => 'required|string|size:11',
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error('Some data is not correct', 400, $validator->errors());
        }

        $updated = $user->update([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'cpf' => $request['cpf'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if ($updated) {
            return $this->response('User updated', 200, $validator->validated());
        }

        return $this->error('User not updated', 400);
    }

    public function destroy(string $user)
    {
        $user = User::find($user);

        if ($user) {
            $deleted = $user->delete();

            if ($deleted) {
                return $this->response('User deleted', 200);
            }
        }

        return $this->error('User not found', 404);
    }
}

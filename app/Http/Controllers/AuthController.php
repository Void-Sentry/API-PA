<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:60',
                'email' => 'required|string|min:60|unique:users',
                'password' => 'required|string|max:8',
                'role_id' => 'required|integer'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role
            ]);

            return response()->json(['status' => 'user registered successfully!', 'token_type' => 'Bearer'], Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    public function login(Request $request)
    {
        try
        {
            $validator = $request->validate([
                'email' => 'required|string|email|exists:users,email',
                'password' => 'required'
            ]);

            $user = User::where('email', $validator['email'])->first();
            $role = Role::findOrFail($user['role_id']);
            $hash = Hash::check($validator['password'], $user->password);

            if($user && $hash)
                return response()->json(['user' => $user, 'role' => $role->name, 'access_token' => $this->roleVerify($user), 'status' => 'successful!'], 200);
            else
                throw ValidationException::withMessages([
                    'email or password' => 'your credentials are invalid!'
                ]);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request)
    {
        try
        {
            auth()->user()->tokens()->delete();

            return response()->json('Logout successful!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    protected function roleVerify($value)
    {
        switch($value->role_id)
        {
            case 1:
                return $token = $value->createToken('auth_token', ['dev'])->plainTextToken;
            break;

            case 2:
                return $token = $value->createToken('auth_token', ['diretor'])->plainTextToken;
            break;

            case 3:
                return $token = $value->createToken('auth_token', ['editor'])->plainTextToken;
            break;

            case 4:
                return $token = $value->createToken('auth_token', ['reporter'])->plainTextToken;
            break;

            default:
                return $token = $value->createToken('auth_token')->plainTextToken;
            break;
        }
    }
}
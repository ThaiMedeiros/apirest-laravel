<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //cadastrar novos usuários
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $registerBd = User::select('id')->where('email', $request->password)->first();

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'user' => $user,
            'access_token' => $accessToken,
            'message' => 'Register successfully'
        ], 201);
    }

    //função para retornar form de login
    public function login(){
        return response()->json(['message' => 'Login page'], 200);
    }

    //loga usuário no sistema
    public function logged(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response()->json([
            'user' => auth()->user(),
            'access_token' => $accessToken,
            'message' => 'Login successfully'
        ], 200);
    }

    //desloga o usuário do sistema
    public function logout(Request $request){
        $isUser = $request->user()->token()->revoke();

        if($isUser){
            $resposta['message'] = 'Logout Success.';
            return response()->json($resposta, 200);
        }
        else{
            $resposta['message'] = 'Error logout.';
            return response()->json($resposta, 404);
        }
    }
}

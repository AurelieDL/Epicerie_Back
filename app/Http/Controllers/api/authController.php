<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class authController extends Controller
{
    public function authenticate(Request $request)
    {
        // $user = User::where('email', $request->email)->first();

        // if(Hash::check($request->password, $user->password)) {
        //     $token = $user->createToken(time())->plainTextToken;
        //     Log::info('$token');
        //     Log::info($token);
        //     $credentials = $request->only('email', 'password');
        //     $userconnected = auth()->attempt($credentials);
        //     Log::info('$credentials');
        //     Log::info($credentials);
        //     Log::info('$userconnected');
        //     Log::info($userconnected);
        //     return response()->json([
        //         'token' => $token
        //     ]);
        // }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $request->session()->regenerate();
    }

    public function me(Request $request)
    {
        return response()->json([
            'data' => $request->user(),
        ]);
    }
}

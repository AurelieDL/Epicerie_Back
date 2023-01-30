<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class authController extends Controller
{
    public function authenticate(Request $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if(Hash::check($request->password, $user->password)) {
            return response()->json([
                'token' => $user->createToken(time())->plainTextToken
            ]);
        }
    }
}

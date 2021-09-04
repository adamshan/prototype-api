<?php

namespace App\Http\Controllers;

use App\APIError;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;


class AuthController extends Controller
{
    private static $tokenName = 'GP Personal Access Token';


    /**
     * Login the user with email and password
     */
    public function login(Request $request)
    {
        $this->validate($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $user->last_login = Carbon::now();
            $user->save();
            $tokenResult = $user->createToken(self::$tokenName);
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addMonth();
            if (null != $request->remember_me) {
                $token->expires_at = Carbon::now()->addYear();
            }
            $token->save();
            return response()->json([
                'token' => [
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ],
                'user' => $user,
            ]);
        } else {
            $unauthorized = new APIError;
            $unauthorized->setStatus("401");
            $unauthorized->setCode("AUTH_LOGIN");
            $unauthorized->setMessage("Le mot de passe ou l'email est invalide");

            return response()->json($unauthorized, 401);
        }
    }

    /**
     * Reset password using the old password
     */

    /**
     * Log out current logged user
     */
    public function logout(Request $req)
    {
        if (Auth::check()) {
            $token = $req->user()->token();
            $token->revoke();
        }
        return response(null, 200);
    }



    /**
     * Get the current logged user
     */
    public function user()
    {
        return Auth::user();
    }


}

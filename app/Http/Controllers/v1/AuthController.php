<?php

namespace App\Http\Controllers\v1;

use Dusterio\LumenPassport\Http\Controllers\AccessTokenController as IssueToken;
use Illuminate\Http\Request;
use App\User;
use Psr\Http\Message\ServerRequestInterface;

class AuthController extends IssueToken
{
    /**
     * Generate access token
     * @param  Request $request
     * @return JSON
     */
    public function getToken(Request $request, ServerRequestInterface $serverRequest)
    {
        // Get content
        $content = json_decode($request->getContent());

        // Set default rules
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'grant_type' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
        ];

        // Validation request
        validateRequest($content, $rules);

        $issueToken = $this->issueToken($serverRequest);
        $getCode = $issueToken->getStatusCode();

        // If login success
        if ($getCode == 200) {
            $response = json_decode($issueToken->getBody(), true);

            return showResponseSuccess($response);
        } else {
            $response = json_decode($issueToken->getContent());
            return showResponseError($getCode, $response->message);
        }
    }


    public  function tokens(){
     return  User::where('sekolah_id',4)->pluck('fcm_token');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController;

class CustomAccessTokenController extends AccessTokenController
{
    /**
     * Hooks in before the AccessTokenController issues a token
     *
     * Return the issues token as well as current user name, email, id
     *
     * @param  ServerRequestInterface $request
     * @return mixed
     */
    public function issueUserToken(ServerRequestInterface $request)
    {
        $httpRequest = request();
        // issue token
        $response = $this->issueToken($request);

        // confirm this is 200
        if($response->status() === 200) {
            // pull this user
            $user = \App\User::where('email', $httpRequest->username)->first();
            // convert to object
            $content = json_decode($response->content());
            // add user info to content
            $content->name = $user->name;
            $content->email = $user->email;
            $content->id = $user->id;

            // add new content
            $response->setContent( json_encode($content) );
        }
        // return response of token
        return $response;
    }
}

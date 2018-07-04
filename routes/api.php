<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Override token request to return user model
/**
 * /api/oauth/token
 *
 * Form
 * key | value
 * grant_type | password
 * client_id | 2
 * client_secret | CaQjVYgE1f6uUAhtRO8BOdZPPwIja3GD2OMneGII
 * username | admin@example.com
 * password | secret
 *
 * Success
 * {
 *     "token_type": "Bearer",
 *     "expires_in": 31536000,
 *     "access_token": "token",
 *     "refresh_token": "token",
 *     "name": "Admin",
 *     "email": "admin@example.com",
 *     "id": 1
 * }
 *
 * Error 401
 * {
 *     "error": "invalid_credentials",
 *     "message": "The user credentials were incorrect."
 * }
 *
 * Error 401
 * {
 *     "error": "invalid_client",
 *     "message": "Client authentication failed"
 * }
 *
 * Error 400
 * {
 *     "error": "unsupported_grant_type",
 *     "message": "The authorization grant type is not supported by the authorization server.",
 *     "hint": "Check the `grant_type` parameter"
 * }
 */
Route::post('/oauth/token', [
    'uses' => 'Auth\CustomAccessTokenController@issueUserToken'
]);

/**
 * /api/user
 *
 * Headers
 * key | value
 * Content-Type | application/x-www-form-urlencoded
 * Authorization | Bearer TOKEN
 * Accept | application/json
 *
 * Success
 * [
 *     {
 *         "id": 1,
 *         "name": "Admin",
 *         "email": "admin@example.com",
 *         "created_at": "2018-02-17 16:36:26",
 *         "updated_at": "2018-02-17 16:36:26"
 *     }
 * ]
 *
 * Error 401
 * {
 *     "error": "Unauthenticated."
 * }
 */
Route::middleware('auth:api')->group( function () {
    // Request all users
    Route::get('users', 'Api\UserController@index');
    // Request current user
    Route::get('user', function() {
        return response()->json(request()->user());
    });
});

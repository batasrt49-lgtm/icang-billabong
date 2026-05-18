<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    private $client_id;
    private $client_secret;
    private $redirect_uri = "http://icang-billabong.test/auth/google/callback";

    public function __construct()
    {
        $this->client_id = env('GOOGLE_CLIENT_ID');
        $this->client_secret = env('GOOGLE_CLIENT_SECRET');
    }

    public function redirect()
    {
        $state = bin2hex(random_bytes(16));
        session(['oauth_state' => $state]);

        $params = [
            'client_id' => $this->client_id,
            'redirect_uri' => $this->redirect_uri,
            'response_type' => 'code',
            'scope' => 'openid email profile',
            'access_type' => 'online',
            'prompt' => 'select_account',
            'state' => $state
        ];

        $url = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query($params);

        return redirect($url);
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            return "Code Google tidak ditemukan";
        }

        if ($request->state != session('oauth_state')) {
            return "State OAuth tidak valid";
        }

        $postData = [
            'code' => $request->code,
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'redirect_uri' => $this->redirect_uri,
            'grant_type' => 'authorization_code'
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://oauth2.googleapis.com/token");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $token = json_decode($response, true);

        if (!isset($token['access_token'])) {
            return response()->json($token);
        }

        $access_token = $token['access_token'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/oauth2/v2/userinfo");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $access_token"
        ]);

        $userInfoResponse = curl_exec($ch);
        curl_close($ch);

        $userInfo = json_decode($userInfoResponse, true);

        if (!isset($userInfo['email'])) {
            return response()->json($userInfo);
        }

        session([
            'user' => [
                'name' => $userInfo['name'],
                'email' => $userInfo['email'],
                'picture' => $userInfo['picture']
            ]
        ]);

        return redirect('/');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }

    public function adminOnly()
    {
        if (session('user.email') != 'ihsan992277@gmail.com') {
            abort(403);
        }

        return "Halaman Admin";
    }
}
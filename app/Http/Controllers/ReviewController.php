<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Google_Client;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = [
            'client_id' => env('GOOGLE_CLIENT_ID', ''),
            'client-secret' => env('GOOGLE_CLIENT_SECRET', ''),
        ];
        $email = Auth::user()->email;

        $token = Auth::user()->google_token;

        $json = Http::withToken($token)->get('https://mybusiness.googleapis.com/v4/accounts/01735906481906504931/locations')->json();

        dd($json);
        // $token = Socialite::driver('google')->user()->token;
        // dd($user);
        // $client = new \Google_Client();
        // $google_client_token = [
        //     'access_token' => Auth::user()->google_token,
        //     'refresh_token' => Auth::user()->google_refresh_token,
        //     'expires_in' => Auth::user()->google_token_expire,
        // ];
        // $client->setApplicationName("Laravel");
        // $client->setDeveloperKey(env('GOOGLE_SERVER_KEY'));
        // $client->setAccessToken(json_encode($google_client_token));
        // $reviews = [];
        // $response = Http::withBasicAuth(Auth::user()->email, Auth::user()->remember_token)->get('https://mybusinessaccountmanagement.googleapis.com/v1/accounts');
        // return $response->json();
        // return view('reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TestingController extends Controller
{
    public function hallo(): JsonResponse
    {
        //1. string
        //2. view
        //3. json
        $str = "halo apa kabar";
        return response()->json([
            "code" => ResponseAlias::HTTP_OK,
            "message" => "success",
            "data" => $str
        ]);
    }

    public function loginForm(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|string|min:20",
            "password" => "required|string|min:6"
        ]);

        $result = Http::withHeaders([
            "Content-Type", "application/json",
        ])->post("http://localhost/api/v1/login", $request->all());

        if ($result->status() == 201) {
            return response()->json($result->status(), "success", (array)$result->body());
        }

        return redirect()->to("/login")->withErrors("message", "login gagal");
    }

    public function registerForm(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("register");
    }

    public function aboutMe()
    {
        $name = "Jehan Afwazi Ahmad";
        $address = "Parakan Temanggung";

        $hobbies = [
            "nonton tv",
            "jalan jalan",
            "lari lari",
            "belanja"
        ];


        return view("about-me", [
            "active" => "about",
            "name" => $name,
            "address" => $address,
            "hobbies" => $hobbies
        ]);
    }

    public function juzzamma(Request $request)
    {
        $key = $request->get("search");

        $url = "https://raw.githubusercontent.com/wzije/masterdata/refs/heads/main/religions/json/juzzamma.json";
        $response = Http::get($url);
        $responseData = json_decode($response->body());

        $collectResp = collect($responseData->data);

        if ($key) {
            $collectResp = $collectResp->where("name_latin", $key);
        }

        return view("juzzamma", [
            "datalist" => $collectResp
        ]);

    }
}

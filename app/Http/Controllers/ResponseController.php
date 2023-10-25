<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response('welcome', 200);
    }

    public function header(Request $request): Response
    {
        $body = [
            'firstName' => "Fajruns",
            'lastName' => "Shubhi"
        ];

        return response(json_encode($body), 200)->header('Content-Type', 'application/json')
            ->withHeaders([
                "Author" => "Jrunss",
                "App" => "Belajar Laravel Dasar",
            ]);

        // cara lain 
        // return response(json_encode($body), 200, [
        //     "Author" => "Jrunss",
        //     "App" => "Belajar Laravel Dasar",
        //     'Content-Type' => 'application/json'
        // ]);
    }

    public function responseView(Request $request): Response
    {
        return response()
            ->view('welcome', ["name" => "Fajrun"], 200,  [
                "Author" => "Jrunss",
                "App" => "Belajar Laravel Dasar",
                // 'Content-Type' => 'application/json'
            ]);
    }

    public function responseJson(Request $request): JsonResponse
    {
        $body = ["fname" => "fajrun", "lname" => "shubhi", "age" => "21"];
        return response()
            ->json($body);
    }

    public function responseFile(Request $request): BinaryFileResponse
    {
        return response()
            ->file(storage_path("app/public/pictures/Sekolah Dasar2.png"));
    }
    public function responseDownload(Request $request): BinaryFileResponse
    {
        return response()
            ->download(storage_path("app/public/pictures/Sekolah Dasar2.png"));
    }
}

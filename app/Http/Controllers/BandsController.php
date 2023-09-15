<?php

namespace App\Http\Controllers;

class BandsController extends Controller
{
    public function all(): void
    {
        response()->json([
            "message" => "implement this method..."
        ])->setStatusCode(200)->send();
    }

    public function getById(string $bandId): void
    {
        response()->json([
            "message" => "implement this method..."
        ])->setStatusCode(200)->send();
    }

    public function getByGender(string $bandGender): void
    {
        response()->json([
            "message" => "implement this method..."
        ])->setStatusCode(200)->send();
    }

    public function save(): void
    {
        response()->json([
            "message" => "implement this method..."
        ])->setStatusCode(200)->send();
    }

    public function update(string $bandId): void
    {
        response()->json([
            "message" => "implement this method..."
        ])->setStatusCode(200)->send();
    }

    public function delete(string $bandId): void
    {
        response()->json([
            "message" => "implement this method..."
        ])->setStatusCode(200)->send();
    }
}

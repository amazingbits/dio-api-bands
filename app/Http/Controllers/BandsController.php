<?php

namespace App\Http\Controllers;

use App\Models\BandsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BandsController extends Controller
{
    public function all(): void
    {
        $bands = BandsModel::orderBy("name", "ASC")->get();
        response()->json($bands)->setStatusCode(200)->send();
    }

    public function getById(string $bandId): void
    {
        $band = BandsModel::where("id", "=", $bandId)->first();
        if (empty($band)) {
            response()->json([
                "error" => "band not found"
            ])->setStatusCode(404)->send();
            exit;
        }
        response()->json($band)->send();
    }

    public function getByGender(string $bandGender): void
    {
        $band = BandsModel::where("gender", "LIKE", "%{$bandGender}%")->get();
        if (empty($band)) {
            response()->json([
                "error" => "band not found"
            ])->setStatusCode(404)->send();
            exit;
        }
        response()->json($band)->send();
    }

    public function save(Request $request): void
    {
        $validation = $request->validate([
            "name" => "required",
            "gender" => "required"
        ]);

        if (BandsModel::where("name", "=", $request->name)->count() > 0) {
            response()->json([
                "error" => "A band with this name already exists"
            ])->send();
            exit;
        }

        $band = new BandsModel();
        $band->id = Str::uuid()->toString();
        $band->name = $request->name;
        $band->gender = $request->gender;
        if (!$band->save()) {
            response()->json([
                "error" => "This band could not been saved"
            ], 500)->send();
        }

        response()->json([
            "message" => "The band {$request->name} has been saved successfully"
        ])->send();
    }

    public function update(string $bandId, Request $request): void
    {
        $validation = $request->validate([
            "name" => "required",
            "gender" => "required"
        ]);

        if (BandsModel::where([
                ["name", "=", $request->name],
                ["id", "<>", $bandId]
            ])->count() > 0) {
            response()->json([
                "error" => "A band with this name already exists"
            ])->send();
            exit;
        }

        $band = BandsModel::where("id", "=", $bandId)->first();
        if (empty($band)) {
            response()->json([
                "error" => "band not found"
            ], 404)->send();
            exit;
        }

        $oldName = $band->name;
        $oldGender = $band->gender;

        $band->name = $request->name;
        $band->gender = $request->gender;
        if (!$band->save()) {
            response()->json([
                "error" => "This band could not been saved"
            ], 500)->send();
        }

        response()->json([
            "message" => "The band {$oldName} with gender {$oldGender} has been updated to name {$request->name} gender {$request->gender} successfully"
        ])->send();
    }

    public function delete(string $bandId): void
    {
        $band = BandsModel::where("id", "=", $bandId)->first();
        if (empty($band)) {
            response()->json([
                "error" => "band not found"
            ], 404)->send();
            exit;
        }
        if (!$band->delete()) {
            response()->json([
                "error" => "This band could not been deleted"
            ], 500)->send();
        }
        response()->json([
            "message" => "The band has been deleted successfully"
        ])->send();
    }
}

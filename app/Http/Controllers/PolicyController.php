<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function PolicyByType(Request $request)
    {
        return Policy::where('type', $request->type)->first();
    }
    public function policyPage()
    {
        return view('frontend.pages.policy-page');
    }

    public function policyAdd(Request $request): JsonResponse
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'des'  => 'required|string',
        ]);

        $data = Policy::create([
            'type' => $request->input('type'),
            'des'  => $request->input('des'),
        ]);

        return response()->json([
            'status' => 'success',
            'data'   => $data,
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CustomerProfileController extends Controller
{


    public function CreateCustomerProfile(Request $request): JsonResponse
    {
        $user_id = Auth::id();
        $request->merge(['user_id' => $user_id]);
        $data = CustomerProfile::updateOrCreate(
            ['user_id' => $user_id],
            $request->input()
        );
        return ResponseHelper::Out('success', $data, 200);
    }

    public function ReadProfile(Request $request): JsonResponse
    {
        $user_id = Auth::id();
        $data = CustomerProfile::where('user_id', $user_id)->with('user')->get();
        return ResponseHelper::Out('success', $data, 200);
    }
}

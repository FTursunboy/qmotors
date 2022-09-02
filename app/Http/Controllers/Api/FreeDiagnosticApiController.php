<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FreeDiagnostic;
use App\Services\Contracts\FreeDiagnosticServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class FreeDiagnosticApiController extends Controller
{
    use ApiResponse;

    public function index(Request $request, FreeDiagnosticServiceInterface $freeDiagnosticService)
    {
        return $this->success($freeDiagnosticService->list($request));
    }

    public function show($id)
    {
        return $this->success(FreeDiagnostic::findOrFail($id));
    }

    public function history(Request $request, FreeDiagnosticServiceInterface $freeDiagnosticService)
    {
        return $this->success($freeDiagnosticService->history($request));
    }
}

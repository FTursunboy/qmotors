<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Models\Review;
use App\Services\Contracts\ReviewServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReviewApiController extends Controller
{
    use ApiResponse;

    public function show($id)
    {
        return $this->success(Review::findOrFail($id));
    }

    public function store(StoreReviewRequest $request, ReviewServiceInterface $reviewService)
    {
        return $reviewService->store($request);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use App\Services\Contracts\ReviewServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReviewApiController extends Controller
{
    use ApiResponse;

    public function index(Request $request, ReviewServiceInterface $reviewService)
    {
        return $this->success(ReviewResource::collection($reviewService->list($request)));
    }

    public function show($id)
    {
        return $this->success(new ReviewResource(Review::findOrFail($id)));
    }

    public function store(StoreReviewRequest $request, ReviewServiceInterface $reviewService)
    {
        return $reviewService->store($request);
    }
}

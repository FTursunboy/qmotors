<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bonus\StoreBonusRequest;
use App\Http\Requests\Bonus\UpdateBonusRequest;
use App\Models\Bonus;
use App\Services\Contracts\BonusServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BonusApiController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $user = auth()->user();
        return $this->success([
            'bonuses' => $user->bonuses,
            'balance' => $user->balance
        ]);
    }

    public function show($id)
    {
        return $this->success(Bonus::where('user_id', auth()->id())->find($id));
    }

    public function store(StoreBonusRequest $request, BonusServiceInterface $bonusService)
    {
        return $this->success($bonusService->store($request), 201);
    }

    public function update($id, UpdateBonusRequest $request, BonusServiceInterface $bonusService)
    {
        return $this->success($bonusService->update($id, $request));
    }
    public function delete($id)
    {
        return $this->success(Bonus::destroy([$id]));
    }
}

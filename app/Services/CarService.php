<?php

namespace App\Services;

use App\Models\CarModel;
use App\Models\UserCar;
use App\Models\UserCarPhoto;
use App\Services\Contracts\CarServiceInterface;

class CarService implements CarServiceInterface
{
    public $class = UserCar::class;

    public function store($request)
    {
        return $this->class::create(array_merge(
            $request->only('car_model_id', 'year', 'last_visit', 'vin', 'mileage', 'number'),
            ['user_id' => auth()->id(), 'status' => $request->get('status', 0), 'id' => $this->class::nextID()],
        ));
    }

    public function update($id, $request)
    {
        $model = $this->class::findOrFail($id);
        $model->update(array_merge(
            $request->only('car_model_id', 'year', 'last_visit', 'vin', 'mileage', 'number'),
            ['status' => $request->get('status', 0)],
        ));
        return $model;
    }

    public function modelList($request)
    {
        return CarModel::where(function ($query) use ($request) {
            if ($request->car_mark_id != null) {
                $query->where('car_mark_id', $request->car_mark_id);
            }
        })->get();
    }

    public function photo($id, $request): UserCarPhoto
    {
        $photo = uploadFile($request->file('photo'), 'user_car');

        return UserCarPhoto::create([
            'id' => UserCarPhoto::nextID(),
            'user_car_id' => $id,
            'photo' => $photo
        ]);
    }

    public function photoDelete($id): bool
    {
        $model = UserCarPhoto::find($id);
        deleteFile($model->photo);
        $model->delete();
        return true;
    }

    public function delete($id)
    {
        return $this->class::where('id', $id)->update(['status' => $this->class::getDeleteStatusId()]);
    }
}

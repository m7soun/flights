<?php

namespace App\Repositories;

abstract class Repository
{
    abstract public function getApi();

    public function find($uuid)
    {
        $model = $this->getModel();
        $result = $model->where('uuid', $uuid)->first();
        return $result;
    }

    public function getWhere($columnName, $value)
    {
        $model = $this->getModel();
        $result = $model->where($columnName, $value)->get();
        return $result;
    }
    public function getWhereFirst($columnName, $value)
    {
        $model = $this->getModel();
        $result = $model->where($columnName, $value)->first();
        return $result;
    }

    public function setInactive($id)
    {
        $model = $this->getWhereFirst('id', $id);
        $model->status = $model::STATUS_INACTIVE;
        if (isset($model->getFillable()['updated_at'])) {
            $model->updated_at = now();
        }
        if (isset($model->getFillable()['deactivated_at'])) {
            $model->deactivated_at = now();
        }
        $model->save();

        return $model;
    }

    public function getAll()
    {
        $model = $this->getModel();

        return $model->get();
    }

    public function getAllActive()
    {
        $model = $this->getModel();

        return $model->where('status', $model::STATUS_ACTIVE)->get();
    }
}

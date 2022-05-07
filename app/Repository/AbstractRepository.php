<?php

namespace App\Repository;

abstract class AbstractRepository
{
    public function index()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        $this->model->create($data->all());
    }

    public function update($data, $id)
    {
        $item = $this->model->findOrFail($id);
        $item->fill($data->all());
        $item->save();
    }

    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);
        $item->delete();
    }
}
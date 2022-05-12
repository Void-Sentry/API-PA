<?php

namespace App\Repository;

use Illuminate\Support\Facades\Storage;

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

    public function upload(Request $request)
    {
        if($request->hasFile('files'))
        {
            Storage::disk('s3')->put($request->user_name . '_' . $request->user_id . '/'. 'anexos_noticia_' . $request->noticia_id . '/' . md5(date('Y-m-d H:i:sv')) . $request->file('files')->extension(), file_get_contents($request->file('files')));
        }
    }

    public function download($path)
    {
        if(Storage::disk('s3')->has($path))
        {
            return Storage::disk('s3')->get($path);
        }
    }

    public function delete($path)
    {
        if(Storage::disk('s3')->has($path))
        {
            Storage::disk('s3')->delete($path);
        }
    }
}
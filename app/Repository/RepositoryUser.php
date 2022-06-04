<?php

namespace App\Repository;

use App\Contracts\RepositoryInterfaceUser;
use App\Models\User;
use App\Repository\AbstractRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RepositoryUser extends AbstractRepository implements RepositoryInterfaceUser
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    public function update($data, $id)
    {
        $item = $this->model->findOrFail($id);
        if(Hash::check($data->password, $item->password)){
            $item->fill([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make($data->newpassword)
            ]);
            $item->save();
        }
    }

    public function roleUser(){
        return DB::table('users as u')
        ->select('u.name', 'u.email', 'r.name as cargo')
        ->join('roles as r', 'r.id', 'u.role_id')
        ->where('u.deleted_at', null)
        ->where('r.name', '!=', 'dev')
        ->where('u.id', '!=', auth()->user()->id)
        ->get();
    }
}
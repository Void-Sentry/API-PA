<?php

namespace App\Repository;

use App\Contracts\RepositoryInterfaceNotice;
use App\Models\Notice;
use App\Repository\AbstractRepository;
use Illuminate\Support\Facades\DB;
class RepositoryNotice extends AbstractRepository implements RepositoryInterfaceNotice
{
    protected $model;

    public function __construct(Notice $model)
    {
        $this->model = $model;
    }

    public function userNotices($id)
    {
        return $this->model::where('user_id', $id)->get();
    }

    public function index()
    {
        return $this->model::where('state', 1)->
        orderBy('title')->get();
    }

    public function state($id)
    {
        $notice=$this->model->find($id);
        $notice->state=1;
        $notice->save();
    }

    public function findAllNotice()
    {
        return DB::table('users as u')
        ->select('n.title', 'u.name', 'r.name as cargo')
        ->join('notices as n', 'n.user_id', 'u.id')
        ->join('roles as r', 'r.id', 'u.role_id')
        ->where('n.state', 0)
        ->orderBy('n.title')
        ->get(); 
        
    }
}
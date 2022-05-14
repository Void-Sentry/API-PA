<?php

namespace App\Repository;

use App\Contracts\RepositoryInterfaceNotice;
use App\Models\Notice;
use App\Repository\AbstractRepository;

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
}
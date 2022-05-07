<?php

namespace App\Repository;

use App\Contracts\RepositoryInterfaceUser;
use App\Models\User;
use App\Repository\AbstractRepository;

class RepositoryUser extends AbstractRepository implements RepositoryInterfaceUser
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
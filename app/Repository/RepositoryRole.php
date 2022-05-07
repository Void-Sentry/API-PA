<?php

namespace App\Repository;

use App\Contracts\RepositoryInterfaceRole;
use App\Models\Role;
use App\Repository\AbstractRepository;

class RepositoryRole extends AbstractRepository implements RepositoryInterfaceRole
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}
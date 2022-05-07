<?php

namespace App\Repository;

use App\Contracts\RepositoryInterfaceStatus;
use App\Models\Status;
use App\Repository\AbstractRepository;

class RepositoryStatus extends AbstractRepository implements RepositoryInterfaceStatus
{
    protected $model;

    public function __construct(Status $model)
    {
        $this->model = $model;
    }
}
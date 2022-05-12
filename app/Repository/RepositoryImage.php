<?php

namespace App\Repository;

use App\Repository\AbstractRepository;
use App\Contracts\RepositoryInterfaceImage;
use App\Models\Image;

class RepositoryImage extends AbstractRepository implements RepositoryInterfaceImage
{
    protected $model;

    public function __construct(Image $image)
    {
        $this->model = $image;
    }
}
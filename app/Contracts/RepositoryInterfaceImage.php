<?php

namespace App\Contracts;

interface RepositoryInterfaceImage
{
    public function upload($path);

    public function download($path);

    public function delete($path);
}
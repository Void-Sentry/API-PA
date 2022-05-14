<?php

namespace App\Contracts;

interface RepositoryInterfaceNotice
{
    public function index();

    public function show($id);

    public function store($data);

    public function update($data, $id);
    
    public function destroy($id);

    public function userNotices($id);
}
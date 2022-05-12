<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contracts\RepositoryInterfaceImage;

class ImageController extends Controller
{
    protected $repository;

    public function __construct(RepositoryInterfaceImage $interface)
    {
        $this->repository = $interface;
    }

    public function upload($path)
    {
        try
        {
            $this->repository->upload($path);
            return response()->json('Uploaded!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function download()
    {
        try
        {
            $this->repository->download($path);
            return response()->json('Uploaded!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete()
    {
        try
        {
            $this->repository->delete($path);
            return response()->json('Uploaded!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
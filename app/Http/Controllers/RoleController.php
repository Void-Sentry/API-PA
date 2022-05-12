<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contracts\RepositoryInterfaceRole;

class RoleController extends Controller
{
    protected $RepositoryRole;

    public function __construct(RepositoryInterfaceRole $repository)
    {
        $this->RepositoryRole = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->RepositoryRole->index(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $this->RepositoryRole->store($request);

            return response()->json('Created!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            return response()->json($this->RepositoryRole->show($id), Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $this->RepositoryRole->update($request, $id);

            return response()->json('Updated!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->RepositoryRole->destroy($id);

            return response()->json('Deleted!', Response::HTTP_OK);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
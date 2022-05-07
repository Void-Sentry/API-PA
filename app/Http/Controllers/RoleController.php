<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
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
        return response()->json($this->RepositoryRole->index(), 200);
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

            return response()->json('Created!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), 500);
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
            return response()->json($this->RepositoryRole->show($id), 200);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), 500);
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

            return response()->json('Updated!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), 500);
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

            return response()->json('Deleted!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
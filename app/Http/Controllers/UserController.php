<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Contracts\RepositoryInterfaceUser;

class UserController extends Controller
{
    protected $RepositoryUser;

    public function __construct(RepositoryInterfaceUser $repository)
    {
        $this->RepositoryUser = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->RepositoryUser->index(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            return response()->json($this->RepositoryUser->show($id), 200);
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
            $this->RepositoryUser->update($request, $id);

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
            $this->RepositoryUser->destroy($id);

            return response()->json('Deleted!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
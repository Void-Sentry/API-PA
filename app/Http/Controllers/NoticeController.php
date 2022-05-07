<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Contracts\RepositoryInterfaceNotice;

class NoticeController extends Controller
{
    protected $RepositoryNotice;

    public function __construct(RepositoryInterfaceNotice $repo)
    {
        $this->RepositoryNotice = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->RepositoryNotice->index(), 200);
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
            $this->RepositoryNotice->store($request);

            return response()->json('Created!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e, 500);
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
            return response()->json($this->RepositoryNotice->show($id), 200);
        }
        catch(Exception $e)
        {
            return response()->json($e, 500);
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
            $this->RepositoryNotice->update($request, $id);

            return response()->json('Updated!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e, 500);
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
            $this->RepositoryNotice->destroy($id);

            return response()->json('Deleted!', 200);
        }
        catch(Exception $e)
        {
            return response()->json($e, 500);
        }
    }
}
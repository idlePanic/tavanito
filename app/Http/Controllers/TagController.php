<?php

namespace App\Http\Controllers;

use App\Http\Resources\Tag as TagResource;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        return response()->json($tag , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return TagResource
     */
    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());


        return response()->json($tag, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return Response
     * @throws Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(null, 204);
    }
}

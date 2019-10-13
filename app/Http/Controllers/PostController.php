<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PostResource::collection(Post::all());
//        return Post::all();
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
    public function store(PostRequest $request)
    {
        $success = false;

        DB::beginTransaction();
        try {
            $post = Post::create($request->all());
            if (isset($request->tag_ids)){
                foreach ($request->tag_ids as $tagId) {
                    $post->tags()->attach($tagId);
                }
            }


            $success = true;
        }
        catch (\Exception $e){
            dd($e);
        }
        if ($success) {
            DB::commit();
            return response()->json($post, 201);
        } else {
            DB::rollback();
            return response()->json("error", 402);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Post
     */
    public function show(Post $post)
    {
        return new PostResource($post);
//        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        DB::table('post_tag')->where('post_id' , '=' , $post->id)->delete();

        if (isset($request->tag_ids)){
            foreach ($request->tag_ids as $tagId) {
                $post->tags()->attach($tagId);
            }
        }

        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}

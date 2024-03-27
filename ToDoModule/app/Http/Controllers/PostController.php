<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('CRUD',
            ['posts' => Post::orderBy('updated_at', 'desc')->get()]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('CRUD_Create', [
            'author' => auth()->user()->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // return response()->json("Haha");
        $data = $request->validated();
        Post::create($data);
        return redirect()->route('crud');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post->created_at = Carbon::parse($post->created_at)->format('d/m/Y H:i:s');
        // $post->updated_at = Carbon::parse($post->updated_at)->format('d/m/Y H:i:s');
        return Inertia::render('CRUD_Read',
            ['post'=> $post]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return Inertia::render('CRUD_Edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return redirect()->route('crud.read', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('crud');
    }

    public function deleteBulk(Request $request){
        Post::destroy($request->ids);
        return redirect()->route('crud');
    }
}

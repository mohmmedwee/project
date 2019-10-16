<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Posts::all();
        return view('posts.index')->with('posts', $model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @return object post created
     */
    public function store(Request $request)
    {
        $model = new Posts();
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $request->merge(['user_id' => Auth::user()->id]);
        $model->create($request->all());

        return view('posts.index')->with('posts', $model::all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Posts::with(['user', 'comments'])->findOrFail($id);
        return view('posts.show')->with('post', $model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Posts::findOrFail($id);
        return view('posts.update')->with('post', $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Posts::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $model->update($request->all());
        return view('posts.show')->with('post', $model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Posts::findOrFail($id);
        $model->delete();
        return redirect()->route('posts.index')->with('post', $model);

    }
}

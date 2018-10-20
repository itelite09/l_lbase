<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Authorizable;

use App\Tag;

class PictureController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = Picture::latest()->paginate();
        return view('picture.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tagsDropDown = Tag::pluck('tag', 'id');
        return view('picture.new', compact('tagsDropDown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // normal store on db
        /**/
        $this->validate($request, [
            'image' => 'required|min:2',
            'tags' => 'required'
        ]);

        /*
        $tag = Picture::create($request->all());
        */
        //dd(implode(',',$request->get('tags')));

        // many tags store on db
        if(!empty($request->get('tags'))) {
$post = Picture::create([
        'image' => $request->get('image'),
        'tags' => implode(',',$request->get('tags'))
    ]);
}

/*
        if($post)
    {        
        $tagNames = explode(',', $request->get('tags'));
        $tagIds = [];
        foreach($tagNames as $tagName)
        {
            //$post->tags()->create(['name'=>$tagName]);
            //Or to take care of avoiding duplication of Tag
            //you could substitute the above line as
            $tag = \Tag::firstOrCreate(['tag' => $tagName]);
            if($tag)
            {
              $tagIds[] = $tag->id;
            }

        }
        $post->tags()->sync($tagIds);
    }*/

        flash('Image has been added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}

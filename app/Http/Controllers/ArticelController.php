<?php

namespace App\Http\Controllers;

use App\Articel;
use App\author;
use App\category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $articels = Articel::with(['category', 'author'])->get();

        return view('cms.articels.simple', ['articels' => $articels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = category::all();
        $authors = author::where('status', 'Active')->get();
        return view('cms.articels.general', ['authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required|exists:categories,id|integer',
            'author_id' => 'required|exists:authors,id|integer',
            'art_title' => 'required|string|min:3',
            'art_short' => 'required|string|min:3',
            'art_full' => 'required|string|min:3',
            'articel_image' => 'required|image',
            'visibility_status' => 'required|in:on,off'
        ]);
        if ($request->hasFile('articel_image')) {
//            dd('saved');

            $nowTime =  Carbon::now();
            $time = $nowTime->hour.'_'.$nowTime->minute.'_'.$nowTime->second;
            $articelImage = $request->file('articel_image');
            $name = $time.'_'.$request->get('art_title') . '_' . $articelImage->getClientOriginalName();
            $articelImage->move("images\articels\//",$name);

        }

        $articel = new Articel();
        $articel->title = $request->get('art_title');
        $articel->short_desc = $request->get('art_short');
        $articel->full_desc = $request->get('art_full');
        $articel->visibility_status = $request->get('visibility_status') == 'on' ? 'visible' : 'hide';
        $articel->category_id = $request->get('category_id');
        $articel->author_id = $request->get('author_id');
        $articel->image = $name;
        $isSaved = $articel->save();
        if ($isSaved) {
            return redirect()->route('art.con.index');
        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = category::all();
        $articel = Articel::find($id);
        $authors= Author::all();
        return view('cms.articels.edit', ['articel' => $articel, 'categories' => $categories ,'authors'=>$authors]);
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
        //
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|exists:articels,id|integer',
            'category_id' => 'required|exists:categories,id|integer',
            'author_id' => 'required|exists:authors,id|integer',
            'art_title' => 'required|string|min:3',
            'art_short' => 'required|string|min:3',
            'art_full' => 'required|string|min:3',
            'articel_image' => 'required|image',
            'visibility_status' => 'in:on,off'
        ]);
        if ($request->hasFile('articel_image')) {
//            dd('saved');

            $nowTime =  Carbon::now();
            $time = $nowTime->hour.'_'.$nowTime->minute.'_'.$nowTime->second;
            $articelImage = $request->file('articel_image');
            $name = $time.'_'.$request->get('art_title') . '_' . $articelImage->getClientOriginalName();
            $articelImage->move("images\articels\//",$name);

        }

        $articel = Articel::find($id);
        $articel->title = $request->get('art_title');
        $articel->short_desc = $request->get('art_short');
        $articel->full_desc = $request->get('art_full');
        $articel->visibility_status = $request->get('visibility_status') == 'on' ? 'visible' : 'hide';
        $articel->category_id = $request->get('category_id');
        $articel->author_id = $request->get('author_id');
        $articel->image = $name;
        $isSaved = $articel->save();
        if ($isSaved) {
            return redirect()->route('art.con.index');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = $articel = Articel::destroy($id);
        if ($isDeleted) {
            return redirect()->route("art.con.index");
        } else {

        }
    }
}

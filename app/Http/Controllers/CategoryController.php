<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = category::withCount('articels')->get();
        return view('cms.pages.forms.simple', ['categories' => $categories]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.pages.forms.general');
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
            'cat_title' => 'required|string|min:3|max:20',
            'cat_details' => 'required|string|min:3|max:100',
            'visibility_status' => 'in:on,off'
        ]);
        $category = new category();
        $category->title = $request->get('cat_title');
        $category->details = $request->get("cat_details");
        $category->visibility_status = $request->get('visibility_status') == "on" ? "visible" : "hide";
        $isSaved = $category->save();
        if ($isSaved) {
            session()->flash('status', true);
            session()->flash('message','Category Created sucessfuly');
//            return redirect()->route("cat.con.index");
        } else {
            session()->flash('stauts',false);
            session()->flash('message','Faild to creat Category');
        }
        return redirect()->back();

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
        $category = category::find($id);

        if (!is_null($category)) {
            echo $category->title;
        } else {
            echo "failed";
        }

    }

    public function showArticel($id)
    {
        $category = category::with(['articels' => function ($query) use ($id) {
            $query->where('category_id', $id);
        }])->find($id);
        return view('cms.pages.forms.simple', ['categories' => $category->articels]);
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
        $category = category::find($id);
        return view('cms.pages.forms.edit', ['category' => $category]);
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
            'id' => 'required|exists:categories',
            'cat_title' => 'required|string|min:3|max:20',
            'cat_details' => 'required|string|min:3|max:100',
            'visibility_status' => 'in:on,off'
        ]);
        $category = category::find($id);
        $category->title = $request->get("cat_title");
        $category->details = $request->get("cat_details");
        $category->visibility_status = $request->get('visibility_status') == "on" ? "visible" : "hide";
        $isSave = $category->save();
        if ($isSave) {
            return redirect()->route("cat.con.index");
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
        $isDeleted = $category = category::destroy($id);
        if ($isDeleted) {
            return redirect()->route("cat.con.index");
        } else {

        }

    }
}

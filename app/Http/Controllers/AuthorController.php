<?php

namespace App\Http\Controllers;

use App\author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $author = author::withCount('articels')->get();
        return view('cms.authors.simple', ['authors' => $author]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.authors.general');
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
            'first_name' => 'required |string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|email|unique:authors,email',
            'password' => 'required|string|min:4',
            'gender' => "required|string|in:Male,Female",
            'mobile' => 'required|numeric|regex:/[0-9]{12}/|digits:12|unique:authors,mobile',
        ]);
        $author = new author();
        $author->first_name = $request->get('first_name');
        $author->last_name = $request->get('last_name');
        $author->email = $request->get('email');
        $author->password = Hash::make($request->get('password'));
        $author->gender = $request->get('gender') == 'Male' ? 'M' : 'F';
        $author->mobile = $request->get('mobile');
        $isSaved = $author->save();
        if ($isSaved) {
            return redirect()->route('author.con.index');
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

    public function showArticels($id)
    {
        $author=author::with('articels')->find($id);
        return view('cms.articels.simple',['articels'=>$author->articels]);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
        $author = author::find($id);
        return view('cms.authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required |exists:authors,id',
            'first_name' => 'required |string|min:3',
            'last_name' => 'required|string|min:3',
            'email' => 'required|email|unique:authors,email,' . $id,
            'gender' => "required|string|in:Male,Female",
            'mobile' => 'required|numeric|regex:/[0-9]{12}/|digits:12|unique:authors,mobile,' . $id,

        ]);
        $author = author::find($id);
        $author->first_name = $request->get('first_name');
        $author->last_name = $request->get('last_name');
        $author->email = $request->get('email');
        $author->password = Hash::make($request->get('password'));
        $author->gender = $request->get('gender') == 'Male' ? 'M' : 'F';
        $author->mobile = $request->get('mobile');
        $isSaved = $author->save();
        if ($isSaved) {
            return redirect()->route('author.con.index');
        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
        $isDestroyed = author::destroy($id);
        if ($isDestroyed) {
            return redirect()->route('author.con.index');
        }
    }
}

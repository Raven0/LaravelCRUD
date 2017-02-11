<?php

namespace App\Http\Controllers;

use App\blog;
use DB;
use Illuminate\Http\Request;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$blogs = blog::all();
        //$blogs = DB::table('blog')->paginate(2);
        $blogs = blog::paginate(2);
        
        return view('blog.index',['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required', 'subject' => 'required', 
        ]);
        
        $blog = new blog;
        $blog->title = $request->title;
        $blog->subject = $request->subject;
        $blog->slug = str_slug($request->title, '-');
        $blog->save();
        return redirect('blog')->with('pesan', 'post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        /*$blog = blog::find($id);*/
        $blog = blog::where('slug',$title)->first();
        
        if(!$blog){
            abort(404);
        }
        
        return view('blog.single')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = blog::find($id);
        
        if(!$blog){
            abort(404);
        }
        
        return view('blog.edit')->with('blog', $blog);
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
        $this->validate($request, [
           'title' => 'required', 'subject' => 'required', 
        ]);
        
        $blog = blog::find($id);
        $blog->title = $request->title;
        $blog->subject = $request->subject;
        $blog->slug = str_slug($request->title, '-');
        $blog->save();
        return redirect('blog')->with('pesan', 'post edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = blog::find($id);
        $blog->delete();
        return redirect('blog')->with('pesan', 'post deleted!');
    }
}

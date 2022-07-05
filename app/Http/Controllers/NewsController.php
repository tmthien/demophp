<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::simplePaginate(5);
        if($key = request()->key){
            $news = News::where('title', 'like', '%'.$key.'%')->simplePaginate(5);
        }
        return view('news.index',['title' => 'Danh sách tin tức'], compact('news'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category  = Category::all();
        return view('news.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        if($request->has('file_upload'))
        {
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$extension;
            $file->move(public_path('uploads'), $file_name);
        }

        $request->merge(['thumbnail' => $file_name]);
        News::create($request->all());
        return redirect()->route('news.index')->with('thongbao', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $category  = Category::all();

        return view('news.edit',['title' => 'Chỉnh sửa danh mục'], compact('news','category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if($request->has('file_upload'))
        {
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$extension;
            $file->move(public_path('uploads'), $file_name);
        }

        $news->update($request->all());
        return redirect()->route('news.index')->with('thongbao', 'Cập nhật tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('thongbao', 'Xoá tin tức thành công!');
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\newsCategory;
use App\Models\news;
use App\Models\news_image;
use file;
class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // retriving the category from database using eloquent-orm

        $Categorys = newsCategory::all();
        return view('news/create_news',compact('Categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $Categorys = newsCategory::all();
        $news_detail = news::with('news_image')->where('news.id',$id)->get();      
        // echo"<pre>"; print_r($news_detail);exit; 
        return view('news.details',compact('Categorys','news_detail'));
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
            'user_id' => 'required',
            'category_id' => 'required',    
            'news_title' => 'required',
            'description' => 'required',
             'image' => 'required',
             'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
         ]);   
        
        $user_id = $request->input('user_id');
        $category_name = $request->input('category_id');
        $news_title = $request->input('news_title');
        $description = $request->input('description');

        $form= new news();
        $form->user_name=$user_id;
        $form->category_name=$category_name;
        $form->news_title=$news_title;
        $form->description=$description;
        $form->save();

        $news_id = $form->id;

        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               
               $name=time().$image->getClientOriginalName();
               $image->move(public_path().'/images/news_image/', $name);  
               
               $image = new news_image();
               $image->news_id = $news_id;
               $image->image = $name;
               $image->save();
           }
        
        }
        return redirect('news/view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Categorys = newsCategory::all();
        $news_result = news::with('news_image')->Paginate(3);
        // echo"<pre>";print_r($news_result); exit;
        return view('news.view',compact('Categorys','news_result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Categorys = newsCategory::all();
          
        $news_edit = news::with('news_image')->where('news.id',$id)->get();
         
    //  echo '<pre>';print_r($news_edit);
    // exit;
         return view('news.edit',compact('news_edit','Categorys'));
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
            'user_id' => 'required',
            'category_id' => 'required',    
            'news_title' => 'required',
            'description' => 'required',
        
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user_id = $request->input('user_id');
        $category_name = $request->input('category_id');
        $news_title = $request->input('news_title');
        $description = $request->input('description');
        $image = $request->file('image');
    //   

        $form= news::find($id);
        $form->user_name=$user_id;
        $form->category_name=$category_name;
        $form->news_title=$news_title;
        $form->description=$description;
        $form->save();
        $news_id = $form->id;
        
        if($image)
        {

           foreach($request->file('image') as $image)
           {
               
               $name=time().$image->getClientOriginalName();
               $image->move(public_path().'/images/news_image/', $name);  
               
               $image = new news_image();
               $image->news_id = $news_id;
               $image->image = $name;
               $image->save();
           }
        
        }
         return redirect('news/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newsdelete($id)
    {
        $news = news::find($id);
        $news_image = news_image::where("news_id",$id)->get();
        foreach($news_image as $news_image){
            $file = public_path().'/images/news_image/'.$news_image->image;
            File::delete($file);
        } 
        $news_image = news_image::where("news_id",$id)->delete();
        $news->delete();
        return redirect('news/view');
    }

    public function CategoryNews($Categoryname)
    {
        $Categorys = newsCategory::all();
        $news_result = news::with('news_image')->where('news.category_name',$Categoryname)->get();
       
        return view('news.category-news',compact('news_result','Categorys'));


    }

    public function find(Request $request){
        $search = $request->input('search');
        $Categorys = newsCategory::all();
        $news_result = news::with('news_image')->where('news.id', 'like', "$search%")
           ->orWhere('news.user_name', 'like', "$search%")
           ->orWhere('news.category_name', 'like', "$search%")
           ->orWhere('news.news_title', 'like', "$search%")
           ->get();
 
           return view('news.searchnews',compact('news_result','Categorys'));
        // return view('searchresult')->with('members', $members);
    }

}

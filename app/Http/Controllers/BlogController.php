<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Blog;
use App\comment;
use App\blog_image;
class BlogController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
  
/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
   


    public function index(){
 
        $Categorys = \App\Category::all();
 
        return view('blog.create',compact('Categorys'));
    }

    public function insert(Request $request){
    
        $this->validate($request, [
           'user_id' => 'required',
           'category_id' => 'required',
           'blog_name' => 'required',
           'description' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user_id = $request->input('user_id');
        $category_name = $request->input('category_id');
        $blog_name = $request->input('blog_name');
        $description = $request->input('description');
        

        $form= new blog();
        $form->user_name=$user_id;
        $form->category_name=$category_name;
        $form->blog_name=$blog_name;
        $form->description=$description;
        $form->save();

        $blog_id = $form->id;
        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               
               $name=$image->getClientOriginalName();
               $image->move(public_path().'/images/blog_image/', $name);  
               
               $image = new blog_image();
               $image->blog_id = $blog_id;
               $image->image = $name;
               $image->save();
           }
        
        }
        

        return redirect('viewblog');
        }

        public function view(){
 
            $Categorys = \App\Category::all();
             $blog = \App\blog::with('blog_image')->Paginate(3);
           
    //        echo '<pre>';print_r($blog);
    //  exit;
            return view('blog.view',compact('blog','Categorys'));
        }

        public function details($id){
            $Categorys = \App\Category::all();
           $blog = \App\blog::with('blog_image')->where('blog.id',$id)->get();
           $blog_comment = \App\blog::with('comment')->where('blog.id',$id)->get();


          
        //      echo '<pre>';print_r($blog);
        //   exit;
            return view('blog.details',compact('blog','blog_comment','Categorys'));
        }

     

        public function edit($id){
 
            $Categorys = \App\Category::all();
          
            $blog = \App\blog::with('blog_image')->where('blog.id',$id)->get();
             
     //     echo '<pre>';print_r($blog);
     //  exit;
             return view('blog.edit',compact('blog','Categorys'));
         }
 
    

         public function blogedit(Request $request, $id){
            $this->validate($request, [
               'user_id' => 'required',
               'category_id' => 'required',
               'blog_name' => 'required',
               'description' => 'required',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $user_id = $request->input('user_id');
            $category_name = $request->input('category_id');
            $blog_name = $request->input('blog_name');
            $description = $request->input('description');
            
    
            $form= new blog();
            $form->exists = true;
            $form->id = $id;
            $form->user_name=$user_id;
            $form->category_name=$category_name;
            $form->blog_name=$blog_name;
            $form->description=$description;
            $form->save();
    
            $blog_id = $form->id;

            if($request->hasfile('image'))
            {
               foreach($request->file('image') as $image)
                   {
                        $name=$image->getClientOriginalName();
                        $image->move(public_path().'/images/blog_image/', $name);      
                        $image = new blog_image();
                        // $image->exists = true;
                        // $image->blog_id = $id;
                        $image->blog_id = $blog_id;
                        $image->image = $name;
                        $image->save();
                    }
            
            }
            
    
            return redirect('viewblog');
            }

            public function blogdelete($id){

                $blog = \App\blog::find($id);

                $blog->delete();
                
                return redirect('viewblog');

            }

            public function comment(Request $request){
                
                $this->validate($request, [
                    'blog_id' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'comment' => 'required',
                     
                 ]);
     
                 $blog_id = $request->input('blog_id');
                 $name = $request->input('name');
                 $email = $request->input('email');
                 $comment = $request->input('comment');
                 
               
                 $blog_comment= new comment();

                 $blog_comment->blog_id=$blog_id;
                 $blog_comment->name=$name;
                 $blog_comment->email=$email;
                 $blog_comment->comment=$comment;
                 $blog_comment->save();
                 return redirect('viewblog');
            }

            public function Categoryblog($Categoryname)
            {
                $Categorys = \App\Category::all();
                $blog = \App\blog::with('blog_image')->where('blog.category_name',$Categoryname)->get();
               
                return view('blog.Category-blog',compact('blog','Categorys'));


            }

            public function find(Request $request){
                $search = $request->input('search');
                $Categorys = \App\Category::all();
                $blog = \App\blog::with('blog_image')->where('blog.id', 'like', "$search%")
                   ->orWhere('blog.user_name', 'like', "$search%")
                   ->orWhere('blog.category_name', 'like', "$search%")
                   ->orWhere('blog.blog_name', 'like', "$search%")
                   ->get();
         
                   return view('blog.searchresult',compact('blog','Categorys'));
                // return view('searchresult')->with('members', $members);
            }


}        



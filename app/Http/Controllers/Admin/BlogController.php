<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class BlogController extends Controller
{

    
    //blogs
   public function index()
   {    
    $blogs = Blogs::paginate(5);    
       
    return view('admin.Blogs.blog')->with(compact('blogs'));
   }
    //end

        //blogs
   public function addBlog()
   {    
    return view('admin.Blogs.add_blog');
   }
    //end

       //add product
   public function saveBlog(Request $request){

    $request->validate([
        'blog_title' => 'required',
        'blog_description' => 'required',
        'blog_source' => 'required',
        'blog_tags' => 'required',
        'blog_category' => 'required',
        'blog_slug' => 'required',
        'blog_image' => 'required',

    ]);

        $imageName = '';
        if($image = $request->file('blog_image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/blogs',$imageName);
        }

        Blogs::create([
            'blog_category'=>$request->blog_category,
            'blog_title'=>$request->blog_title,
            'blog_slug'=>$request->blog_slug,
            'blog_description'=>$request->blog_description,
            'blog_source' => $request->blog_source,
            'blog_views' => $request->blog_views,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $imageName,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,


        ]);

        return redirect("dashboard/blogs");
   }
    //end


    //edit
   public function blogEdit($id)
   {
      $blogs = Blogs::where('id', $id)->first();

       return view('admin.Blogs.update_blog')->with(compact('blogs'));
   }  
   //end



   //update blog
    public function updateBlog(Request $request){

    //get the blog and image file
    $blogs = Blogs::find($request->up_id);
    $image = $request->file('blog_image');
    $new_image = $blogs->blog_image;

    if ($image && $blogs->blog_image != null ) {
    //delete old image from folder
    if(file_exists(public_path('image/blogs/' . $blogs->blog_image))) {
        unlink(public_path('image/blogs/' . $blogs->blog_image));
    }

    //upload new image to folder
    $new_image = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('image/blogs'), $new_image);

    }
    else{
        if($image = $request->file('blog_image')){
            $new_image = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/blogs',$new_image);
        }
    }

    //update blogs with new image name
    $blogs->update([
        'blog_category'=>$request->blog_category,
        'blog_title'=>$request->blog_title,
        'blog_slug'=>$request->blog_slug,
        'blog_description'=>$request->blog_description,
        'blog_source' => $request->blog_source,
        'blog_views' => $request->blog_views,
        'blog_tags' => $request->blog_tags,
        'blog_image' => $new_image,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
    ]);

    return redirect("dashboard/blogs");

    }
     //end


    //delete blog
    public function deleteBlog(Request $request){

    $id = $request->blog_id;
    $blogs = Blogs::find($id);
    $deleteOldImage = public_path('image/blogs/'.$blogs->blog_image); //corrected path
    if(file_exists(public_path('image/blogs/' . $blogs->blog_image))) {
        unlink(public_path('image/blogs/' . $blogs->blog_image));
    }
    $blogs->delete();

    return response()->json([
        'status' => 'success',
    ]);
    }
     //end


    //pagination page
   public function pagination(Request $request){

    $blogs = Blogs::paginate(5);  
    return view('admin.Blogs.pagination_blog',compact('blogs'))->render();

   }

    //search product
   public function searchBlog(Request $request){

    $blogs = Blogs::where('blog_title', 'like', '%'.$request->search_string.'%')
    ->paginate(5);

    if($blogs->count() >= 1){
        return view('admin.Blogs.pagination_blog',compact('blogs'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }
   }
    //end


}
<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogs;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class BlogsController extends Controller

{   

      //blogs
   public function index()
   {    
    $blogs = Blogs::paginate(10);
       
    return view('frontend.blog')->with(compact('blogs'));
   }
    //end

    //blog detail
    public function BlogDetail($blog_slug)
{
    $blogs = Blogs::where('blog_slug', $blog_slug)->first();
    $recent_blogs = Blogs::orderBy('created_at', 'desc')->limit(5)->get();
    $archives = Blogs::orderBy('created_at', 'desc')->get()
        ->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('F Y'); // group by month and year
        });

        $categories = DB::table('blogs')
        ->select(DB::raw('blog_category, COUNT(*) as post_count'))
        ->groupBy('blog_category')
        ->get();

    return view('frontend.blog-detail')->with(compact('blogs', 'recent_blogs','archives','categories'));
}

    //end

       //blogs
   public function BlogSearch(Request $request)
   {    

    $search = $request->input('search');
    $data = Blogs::where('blog_title', 'LIKE', '%'. $search. '%')->paginate(10);

       
    return view('frontend.blog-search')->with(compact('data'));
   }
    //end

 
}
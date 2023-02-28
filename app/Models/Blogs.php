<?php
 
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Blogs extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'blog_category', 'blog_title', 'blog_slug', 'blog_description', 'blog_source', 'blog_views', 'blog_image'
        , 'blog_tags', 'meta_title', 'meta_description'
    ];
}
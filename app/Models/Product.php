<?php
 
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'product_title', 'product_price','product_image', 'product_sku', 'product_condition', 'product_description', 'product_slug', 'product_meta_title', 'product_meta_description','is_sale','is_featured'
        ,'category_id','sub_category_id','brand_id','availability','quantity'
    ];
}
<?php
           
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class ProductController extends Controller
{
    //product view
   public function products()
   {    
        $products = Product::select('products.id as product_id', 'products.*', 'product_categories.*', 'product_brands.*')->
        join('product_categories', 'product_categories.id', '=', 'products.category_id')->
        join('product_brands', 'product_brands.id', '=', 'products.brand_id')
        ->paginate(5);     
        $products_category = ProductCategory::all();
        $products_brand = ProductBrand::all();

        return view('admin.Products.products')->with(compact('products'))->
        with(compact('products_category'))->with(compact('products_brand'));
   }
   

       //add product
   public function addProduct(Request $request){

    $request->validate(
        [
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        
        );

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/products',$imageName);
        }

        Product::create([
            'product_title'=>$request->product_title,
            'product_price'=>$request->product_price,
            'product_slug'=>$request->product_slug,
            'product_sku' => $request->product_sku,
            'product_condition' => $request->product_condition,
            'product_description' => $request->product_description,
            'product_meta_title' => $request->product_meta_title,
            'product_meta_description' => $request->product_meta_description,
            'category_id' => $request->category_id,
            'product_image' => $imageName,
            'is_sale' => 0,
            'is_featured' => 0,
            'brand_id' => $request->brand_id,
            'availability' => $request->availability,
            'quantity' => $request->product_quantity,

        ]);
    

        return response()->json([
            'status' => 'success',
        ]);
   }



   //update product
public function updateProduct(Request $request){

    //get the product and image file
    $product = Product::find($request->up_id);
    $image = $request->file('up_image');
    $new_image = $product->product_image;

    if ($image) {
    //delete old image from folder
    if(file_exists(public_path('image/products/' . $product->product_image))) {
        unlink(public_path('image/products/' . $product->product_image));
    }

    //upload new image to folder
    $new_image = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('image/products'), $new_image);

    }

    //update product with new image name
    $product->update([
        'product_title'=>$request->up_product_title,
        'product_price'=>$request->up_product_price,
        'product_slug'=>$request->up_product_slug,
        'product_sku' => $request->up_product_sku,
        'product_condition' => $request->up_product_condition,
        'product_description' => $request->up_product_description,
        'product_meta_title' => $request->up_product_meta_title,
        'product_meta_description' => $request->up_product_meta_description,
        'category_id' => $request->up_category_id,
        'product_image' => $new_image,
        'brand_id' => $request->up_brand_id,
        'availability' => $request->up_availability,
        'quantity' => $request->up_product_quantity,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}



 //update Featured product status
 public function featuredProduct(Request $request){

    //get the id
    $id = $request->product_id;
    $product = Product::find($id);

    $product->update([
        'is_featured'=>$request->featured,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}

 //update sale product status
 public function saleProduct(Request $request){

    //get the id
    $id = $request->product_id;
    $product = Product::find($id);

    $product->update([
        'is_sale'=>$request->sale,
    ]);

    return response()->json([
        'status' => 'success',
    ]);
}


    //delete product
    public function deleteProduct(Request $request){

    $id = $request->product_id;
    $product = Product::find($id);
    $deleteOldImage = public_path('image/products/'.$product->product_image); //corrected path
    if(file_exists(public_path('image/products/' . $product->product_image))) {
        unlink(public_path('image/products/' . $product->product_image));
    }
    $product->delete();

    // Product::find($request->product_id)->delete();


    return response()->json([
        'status' => 'success',
    ]);

}


    //pagination page
   public function pagination(Request $request){

    $products = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->
    join('product_brands', 'product_brands.id', '=', 'products.brand_id')
    ->paginate(5);  
    return view('admin.Products.pagination_products',compact('products'))->render();

   }

    //search product
   public function searchProduct(Request $request){

    $products = Product::join('product_categories', 'product_categories.id', '=', 'products.category_id')->
    join('product_brands', 'product_brands.id', '=', 'products.brand_id')->where('products.product_title', 'like', '%'.$request->search_string.'%')
    ->orWhere('products.product_price', 'like', '%'.$request->search_string.'%')
    ->paginate(5);

    if($products->count() >= 1){
        return view('admin.Products.pagination_products',compact('products'))->render();
    }else{
        return response()->json([
            'status' => 'nothing_found',

        ]);
    }

   }


}
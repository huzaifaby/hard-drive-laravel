<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function productcsv()
    {
        return view('admin.Products.productcsv');
    }

    public function importproductCsvToDb(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        if ($file = $request->file('file')) {
           
            if ($file->isValid() && $file->isFile()) {
                $newName = $file->getClientOriginalName();
                $file->move(public_path('csvfile'), $newName);
                $file = fopen(public_path('csvfile/' . $newName), "r");
                $i = 0;
                $numberOfFields = 16;
                $csvArr = array();

         

                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);

                        $csvArr[$i]['id'] = $filedata[0];
                        $csvArr[$i]['product_title'] = $filedata[1];
                        $csvArr[$i]['product_price'] = $filedata[2];
                        $csvArr[$i]['product_image'] = $filedata[3];
                        $csvArr[$i]['product_sku'] = $filedata[4];
                        $csvArr[$i]['product_condition'] = $filedata[5];
                        $csvArr[$i]['product_description'] = $filedata[6];
                        $csvArr[$i]['product_slug'] = $filedata[7];
                        $csvArr[$i]['product_meta_title'] = $filedata[8];
                        $csvArr[$i]['product_meta_description'] = $filedata[9];
                        $csvArr[$i]['is_sale'] = $filedata[10];
                        $csvArr[$i]['is_featured'] = $filedata[11];
                        $csvArr[$i]['category_id'] = $filedata[12];
                        $csvArr[$i]['brand_id'] = $filedata[13];
                        $csvArr[$i]['availability'] = $filedata[14];
                        $csvArr[$i]['quantity'] = $filedata[15];

                    $i++;

             
                }
                fclose($file);
                   $count = 0;
                   foreach($csvArr as $productdata){

                    $product = new Product();
 
                    $findRecord = Product::where('id', $productdata['id'])->count();

                
                       
                       if($findRecord == 0){
                           if($product->create($productdata)){
                               $count++;
                           }
                       }
                   }
                   session()->flash('message', $count.' rows successfully added.');
                   session()->flash('alert-class', 'alert-success');
               }
               else{
                   session()->flash('message', 'CSV file coud not be imported.');
                   session()->flash('alert-class', 'alert-danger');
               }
               }else{
               session()->flash('message', 'CSV file coud not be imported.');
               session()->flash('alert-class', 'alert-danger');
               }
           
           return redirect()->route('product.csv');         
       }
       // end
    
   

   


}

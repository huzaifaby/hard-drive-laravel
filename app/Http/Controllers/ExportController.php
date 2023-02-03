<?php
           
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

          
class ExportController extends Controller
{
    //product export
    public function productExportData()
    {
        // file name
        $filename = 'products_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
    
        // get data
        $products = Product::all();
    
        // file creation
        $file = fopen('php://output', 'w');
        if (!$file) {
            abort(500, 'Could not open the file for writing.');
        }
    
        $header = [
            "ID", "Product Title", "Product Price", "Product Image", "Product Sku",
            "Product Condition", "Product Description", "Product Slug", "Product Meta Title", "Product Meta Description", "Is Sale","Is Featured",
            "Category Id", "Brand Id", "Availability", "Quantity", "Created at", "updated at"
        ];
        fputcsv($file, $header);
        foreach ($products as $product) {
            fputcsv($file, $product->toArray());
        }
        fclose($file);
        exit;
    }
    
   

   


}
<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Models\ProductCategory;
use App\Models\SubCategory;

class CategoryComposer
{
    public function compose(View $view)
    {

        $sub_category = SubCategory::join('product_categories', 'product_categories.id', '=', 'sub_categories.category_id')->
        where('sub_categories.category_id', 3)->take(4)->get();
     
        $view->with(['sub_category' => $sub_category]);
    }
}











?>
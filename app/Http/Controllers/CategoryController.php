<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
     public function allCats(Request $request)
    {
        $validate = Validatordator::make();
        Categories::where()->first();
        


    }
}

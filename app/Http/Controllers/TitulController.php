<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Goods;

class TitulController extends Controller
{
    public function index()
    {
        $Product = Goods::all();
        $AllCategory = Category::all();
        foreach($Product as $item){
            foreach($AllCategory as $item2){
                if($item->categories_id == $item2->id){
                    $item->categories_id=$item2->name;
                }
            }
        }
        //sdd($Product); die;
        return view('titulPage',['Product' => $Product, 'AllCategory'=>$AllCategory]);
    }

    public function find(Request $request)
    {

       $category=htmlspecialchars($request->category);

        $Category = Category::where('id','=',$category)->get();
        $Goods = Goods::where('categories_id','=',$category)->get();
        $AllCategory = Category::all();

        foreach($Goods as $item){
            foreach($Category as $item2){
                if($item->categories_id==$item2->id)
                    $item->categories_id=$item2->name;
            }
        }

        return view('titulPage',['Product' => $Goods, 'Category'=>$Category,'AllCategory'=>$AllCategory ]);
    }

}

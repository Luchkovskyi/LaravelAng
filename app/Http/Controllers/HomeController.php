<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Goods;
use Illuminate\Validation;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('home',['Product' => $Product, 'AllCategory'=>$AllCategory]);
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
        return view('home',['Product' => $Goods, 'Category'=>$Category,'AllCategory'=>$AllCategory ]);
    }

    public function add(){
       return view("add");
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:50',
            'desc' => 'required|max:150',
        ]);
    }

    public function create(Request $request)
    {
       if(!empty($request->category)  && !empty($request->name) && !empty($request->desc)) {
            $request->category=htmlspecialchars($request->category);
            $request->name=htmlspecialchars($request->name);
            $request->desc=htmlspecialchars($request->desc);

            $cat = new Category();
            $product = new Goods();

            //var_dump($request->name); exit;
            $cat->name = $request->category;
            $cat->save();
            $indexCat = Category::max('id');

            $product->name=$request->name;
            $product->description=$request->desc;
            $product->categories_id=$indexCat;


            if($request->hasFile('file'))
            {
                $root=$_SERVER['DOCUMENT_ROOT']."/images/";
                $f_name=$request->file('file')->getClientOriginalName();
                $request->file('file')->move($root,$f_name);

                $product->image="/images/".$f_name;
            }
            $product->save();
            return back();
        }
        else {
            return view("add");

        }
    }

    public function update(Request $request)
    {
       $product=Goods::find($request->ind);

       $indexCat = Category::find($product->categories_id);

        $indexCat->name=$request->category;
        $indexCat->save();

        $product->name=$request->name;
        $product->description=$request->desc;
        if($request->hasFile('file'))
        {
            $root=$_SERVER['DOCUMENT_ROOT']."/images/";
            $f_name=$request->file('file')->getClientOriginalName();
            $request->file('file')->move($root,$f_name);

            $product->image="/images/".$f_name;
        }
        $product->save();

        return back();
    }

    public function delete(Request $request){
          var_dump($request); die;
    }
}

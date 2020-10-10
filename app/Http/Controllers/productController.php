<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;

use App\Inventory;
use App\Product;
use App\Variant;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class productController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product =DB::select('select p.id,p.pcode,p.name,p.description,p.brand,p.catID,p.sellingPrice,p.costPrice,p.discount,p.Qty,v.first_name,v.last_name from products p, vendors v where p.supplierId = v.id ');

        return view('Product.allProduct',compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat =Category::all();
        $inv =Inventory::all();
        $brand = Brand::all();
        $vendor = Vendor::all();

        $last = DB::table('products')->latest()->first();
        $barcode = $last->barcode+1;

        return view('Product.addProduct',compact('cat','inv','brand','vendor','barcode'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Product::create($request->all());
        $inv = $request->inventory;
        $last = DB::table('products')->latest()->first();
        $pid = $last->id;
        $qty = $request->Qty;
        DB::insert('insert into inventory_items (inventory_id, product_id,qty,created_at,updated_at) values (?, ?,?,?,?)', [$inv,$pid,$qty,now(),now()]);

        $last = DB::table('products')->latest()->first();
        $pId = $last->id;
        $size = explode(",",$request->size);
        $color = explode(",",$request->color);

        if($size && $color){
            $i = 0;
            foreach($size as $skey=>$svalue){
                foreach($color as $ckey=>$cvalue){

                        $var = new Variant();
                        $var->product_id = $pId;
                        $var->size = $svalue;
                        $var->color= $cvalue;
                        $var->price = $request->price_variant[$i];
                        $var->quantity = $request->qty_variant[$i];
                        $var->save();
                        $i++;
                }
            }
        }else if($size){
            $i = 0;
            foreach($size as $key=>$value){
                $var = new Variant();
                $var->product_id = $pId;
                        $var->size = $value;
                        $var->price = $request->price_variant[$i];
                        $var->quantity = $request->qty_variant[$i];
                        $var->save();
                        $i++;
            }
        }else if($color){
            $i = 0;
            foreach($color as $key=>$value){
                $var = new Variant();
                $var->product_id = $pId;
                        $var->color= $value;
                        $var->price = $request->price_variant[$i];
                        $var->quantity = $request->qty_variant[$i];
                        $var->save();
                        $i++;

            }
        }

        return redirect('/product');


        Session::put('message', 'Success!');
        return redirect('/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Product::findOrFail($id);
        $inven =  DB::table('inventory_items')->where('product_id', $id)->get();
        $var = DB::table('variants')->where('product_id',$id)->get();
        $cat =Category::all();
        $inv =Inventory::all();
        $brand = Brand::all();
        $vendor = Vendor::all();

        return view('Product.editProduct',compact('p','cat','inv','brand','vendor','inven','var'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $input=$request->all();
        $product->update($input);

        $inv = $request->inventory;
        $qty = $request->Qty;
        DB::update('update inventory_items set qty = ?,inventory_id = ? where product_id = ?', [$qty,$inv,$id]);


        $pId = $id;
        $size = explode(",",$request->size);
        $color = explode(",",$request->color);
        DB::delete('delete from variants where product_id = ?', [$id]);

        if($size && $color){
            $i = 0;
            foreach($size as $skey=>$svalue){
                foreach($color as $ckey=>$cvalue){

                        $var = new Variant();
                        $var->product_id = $pId;
                        $var->size = $svalue;
                        $var->color= $cvalue;
                        $var->price = $request->price_variant[$i];
                        $var->quantity = $request->qty_variant[$i];
                        $var->save();
                        $i++;
                }
            }
        }else if($size){
            $i = 0;
            foreach($size as $key=>$value){
                $var = new Variant();
                $var->product_id = $pId;
                        $var->size = $value;
                        $var->price = $request->price_variant[$i];
                        $var->quantity = $request->qty_variant[$i];
                        $var->save();
                        $i++;
            }
        }else if($color){
            $i = 0;
            foreach($color as $key=>$value){
                $var = new Variant();
                $var->product_id = $pId;
                        $var->color= $value;
                        $var->price = $request->price_variant[$i];
                        $var->quantity = $request->qty_variant[$i];
                        $var->save();
                        $i++;

            }
        }

        return redirect('/product');


        Session::put('message', 'Success!');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product=Product::findOrFail($id);
        $Product->delete();
        Session::put('message', 'Success!');

        return redirect()->back();
    }
}

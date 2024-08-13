<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;



class ProductController extends Controller
{
   public function index()
   {
    $products=Product::all();
    return view('vendor.products',compact('products'));
   }
   public function create()
   {
    return view('vendor.add_product');
   }
 public function store(Request $request)
 {


$validator= Validator::make($request->all(),[
   'name'=>'required|string',
   'price' =>'required',
   'quantity' =>'required',
   'image'=> 'mimes:jpeg,jpg,png,gif|max:1000',
]);
if( $validator->fails()){
  return redirect()->back()->withErrors($validator->errors())->withInput();
}

if ($request->has('image'))
{
    $file=$request->file('image');
    $extention = $file->getClientOriginalExtension();
    $filename=time().'_'.$extention;
    $file->move('uploads/product/images',$filename);

}
$user_id=Auth::user()->id;
$product=new Product();
$product->name= $request->name;
$product->price= $request->price;
$product->quantity= $request->quantity;
$product->status= $request->status;
$product->image= $filename;
$product->vendor_id= $user_id;
$product->save();

return redirect()->back()->with('message','Product Added Successfully');

 }
 public function edit($id)
 {
   $product=Product::findOrFail($id);
   return view('vendor.edit_product',compact('product'));
 }
 public function update(Request $request,$id)
 {
    $validator= Validator::make($request->all(),[
        'name'=>'required|string',
        'price' =>'required',
        'quantity' =>'required',
        'image'=> 'mimes:jpeg,jpg,png,gif|max:1000',
     ]);
     if( $validator->fails()){
       return redirect()->back()->withErrors($validator->errors())->withInput();
     }
     $user_id=Auth::user()->id;
     $now = Carbon::now();
     $status= isset($request->status)? 1:0;
     if ($request->has('image'))
     {
         $file=$request->file('image');
         $extention = $file->getClientOriginalExtension();
         $filename=time().'_'.$extention;
         $file->move('uploads/product/images',$filename);
     
     $product=Product::findOrFail($id)->update([
        'name'=> $request->name,
        'price' =>$request->price,
        'quantity' =>$request->quantity,
        'status' =>$status,
        'vendor_id' => $user_id,
        'image'=> $filename,
        'created_at' => $now,
        'updated_at' =>$now
     ]);
    }
    else
    {
        $product=Product::findOrFail($id)->update([
            'name'=> $request->name,
            'price' =>$request->price,
            'quantity' =>$request->quantity,
            'status' =>$status,
            'vendor_id' => $user_id,
            'created_at' => $now,
            'updated_at' =>$now
         ]);
    }
     return redirect()->back()->with('message','Product Updated Successfully');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    
    public function index()
    {
      $result['data']=Product::all();
        
      return view('admin_view.product',$result);  
    }
    
	
	 public function manage_product(Request $req,$id="")
    {
		
		
      if($id>0){
         $arr=Product::where(['id'=>$id])->get();
         $result['product_name']=$arr['0']->product_name;
         $result['category_id']=$arr['0']->category_id;
         $result['product_qty']=$arr['0']->product_qty;
         $result['brand']=$arr['0']->brand;
         $result['unit']=$arr['0']->unit;
         $result['exchangeable']=$arr['0']->exchangeable;
         $result['refundable']=$arr['0']->refundable;
         $result['product_desc']=$arr['0']->product_desc;
         $result['product_img']=$arr['0']->product_img;
         $result['multi_img']=$arr['0']->multi_img;
         $result['weight']=$arr['0']->weight;
         $result['dimension']=$arr['0']->dimension;
         $result['price']=$arr['0']->price;
         $result['sale_price']=$arr['0']->sale_price;
         $result['status']=1;
         $result['id']=$arr['0']->id;
        
        // $result['productAttrArray']=DB::table('products_attr')->where(['product_id'=>$id])->get();
       
      }else{
         $result['product_name']='';
         $result['category_id']='';
         $result['product_qty']='';
         $result['brand']='';
         $result['unit']='';
         $result['exchangeable']='';
         $result['refundable']='';
         $result['product_desc']='';
         $result['product_img']='';
         $result['multi_img']='';
         $result['weight']='';
         $result['dimension']='';
         $result['price']='';
         $result['sale_price']='';
         $result['status']='';
         $result['id']=0;

        
      }
       //echo"<pre>";
      // print_r($result['data']['0']);
      // die();
         $result['category']=DB::table('categories')->where(['status'=>1])->get();
        return view('admin_view/manage_product',$result);
    }
	
	
	
	    public function manage_product_process(Request $req)
    {
      
        if($req->post('id')>0){
            $image_validation='mimes:jpeg,png,jpg';
            
         }else{
            $image_validation= 'required|mimes:jpeg,png,jpg';
           
         }
        $req->validate([
           
             'product_name'=>'required|string|max:255|unique:products,product_name',
             'image'=>$image_validation,
             'price'=>'required|numeric|min:0.01',
			    'category_id'=>'required',
			    'product_qty'=>'required|integer|min:1',
             'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 

             
        ]);
      
      
      if($req->post('id')>0){
         $model=Product::find($req->post('id'));
         $msg="Product Updated";
      }else{
         $model= new Product();
         $msg="Product Inserted";
      }
      

      // multiple images st //

      $uploadedFiles = [];
      if ($req->hasFile('images')) {
          foreach ($req->file('images') as $file) {
              // Store each file and save the path
              $path = $file->store('products', 'public');
              $uploadedFiles[] = $path;
              
          }

         
      }
//  multiple images end 


   if ($req->hasFile('image')) {
   // Store the image
      $imagePath = $req->file('image')->store('media/products', 'public');
      // Optional: Get the file name if needed
      $image_name = basename($imagePath);
   }

    
     
      $model->product_name=$req->post('product_name');
      $model->product_type=$req->post('product_type');
	   $model->category_id=$req->post('category_id');
      $model->brand=$req->post('brand');
      $model->unit=$req->post('unit');
      $model->exchangeable=$req->post('exchangeable');
      $model->refundable=$req->post('refundable');
      $model->product_desc=$req->post('product_desc');
      $model->weight=$req->post('weight');
      $model->price=$req->post('price');
	   $model->sale_price=$req->post('sale_price');
      $model->dimension=$req->post('dimension');
	    $model->product_qty=$req->post('product_qty');
	    $model->product_img=$image_name;
      $model->multi_img = json_encode($uploadedFiles);
      $model->status=1;
      $model->save();
      $product_id=$model->id;


    
      $req->session()->flash('message',$msg);
     
      return redirect('admin/product');

    }
	
	 public function delete(Request $req,$id){
      $model=Product::find($id);
      $model->delete();
      $req->session()->flash('message','Product Deleted Successfuly!');
      return redirect('admin/product');

    }
	
	 public function status(Request $req,$status,$id){
      
      $model=Product::find($id);
      $model->status=$status;
      $model->save();
      $req->session()->flash('message','Product Status Updated');
      return redirect('admin/product');

    }
 
}

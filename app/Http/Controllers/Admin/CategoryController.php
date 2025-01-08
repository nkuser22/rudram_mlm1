<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {


        $result['data']=Category::all();
        return view('admin_view.category',$result);
    }
 
    
    public function manage_category(Request $req,$id=""){
		
		 if($id>0){
		 $arr=Category::where(['id'=>$id])->get();
         $result['category_name']=$arr['0']->category_name;
        // $result['category_slug']=$arr['0']->category_slug;
         $result['id']=$arr['0']->id;
      }else{
         $result['category_name']='';
        // $result['category_slug']='';
        

      }
      // All category
	  $result['catdata']=Category::where('type', 'm_cat')->get();
	  return view('admin_view.manage_category',$result);

     }


    public function manage_category_process(Request $req)
    {
        if($req->post('id')>0){
           $image_validation='mimes:jpeg,png,jpg,gif,svg';
          
        }else{
            $image_validation= 'required|mimes:jpeg,png,jpg,gif,svg';
            
        }
            
    
        $req->validate([
            'category_name'=>'required',
           // 'category_slug'=>'required|unique:categories,category_slug'.$req->post('id'),
            'image' => $image_validation
       ]);
     
       
    
        if($req->post('id')>0){
            $model=Category::find($req->post('id'));
            $msg="Category Updated Successfuly";
        }else{
            $model= new Category();
            $msg="Category Inserted Successfuly";
        }
        
         // upload image st
     if($req->hasfile('image')){
        $image=$req->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('/public/media/category',$image_name);
        $model->category_img=$image_name;
    }
    // upload image end
        $model->category_name=$req->post('category_name');
        //$model->category_slug=$req->post('category_slug');
		
		if($req->post('category_type')!=''){
			$model->is_parent=$req->post('category_type');
			$model->type='s_cat';
		}else{
			$model->type='m_cat';
			$model->is_parent=0;
		}
		
        $model->status=1;
        $model->save();
    
        $req->session()->flash('message',$msg);
        
        return redirect('admin/category');
     
    }

    
    public function destroy(Request $req,$id)
    {
     
    $model=Category::find($id);
    $model->delete();
    $req->session()->flash('message','Category Deleted Successfuly!');
    return redirect('admin/category');
      
          
    }
}

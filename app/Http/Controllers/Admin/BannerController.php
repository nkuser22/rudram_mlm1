<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
class BannerController extends Controller
{

  public function index(){
    
    $banners = Banner::all();
    return view('admin_view.banner.list',compact('banners'));
  }


	public function addbanner(Request $req,$id=""){
    
       $result['bannerdata']=Banner::where('id', $id)->get();
       if($id>0){
		 $arr=Banner::where(['id'=>$id])->get();
         $result['title']=$arr['0']->title;
         $result['id']=$arr['0']->id;
      }else{
         $result['title']='';
         $result['id']='';
        

      } 
	 return view('admin_view.banner.create',$result);
	}


    public function create(Request $request)
{
  
  
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if($request->post('id')>0){
		$model=Banner::find($request->post('id'));
		$msg="Banner Updated Successfuly";
	}else{
		$model= new Banner();
		$msg="Banner Inserted Successfuly";
	}
    $banner = new Banner();
    $banner->title = $request->title;

    // Upload image if provided
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $path = $file->store('banners', 'public'); 
        $banner->image = $path;
    }

    $banner->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/banners');
    
   
}

  public function updatebanner(){
return view('admin_view.banner.create');
}
	
 public function delete(Request $req,$id)
    {
     
    $model=Banner::find($id);
    $model->delete();
    $req->session()->flash('message','Banner Deleted Successfuly!');
    return redirect('admin/banners');
      
          
    }
public function toggleStatus($id)
{
    $banner = Banner::find($id);
    $banner->status = !$banner->status;
    $banner->save();

    $status = $banner->status ? 'enabled' : 'disabled';
    return redirect()->back()->with('message', "Banner {$status} successfully!");
   
}



}

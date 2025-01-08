<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin_view.blog.list', compact('posts'));
    }

    public function addBlog(Request $req,$id=""){
    
       $result['bannerdata']=Post::where('id', $id)->get();
       if($id>0){
		 $arr=Post::where(['id'=>$id])->get();
         $result['title']=$arr['0']->title;
		 $result['content']=$arr['0']->content;
         $result['id']=$arr['0']->id;
      }else{
         $result['title']='';
		 $result['content']='';
         $result['id']='';
        

      } 
	 return view('admin_view.blog.create',$result);
	}


		public function create(Request $request)
	{
	  
		
		$request->validate([
			'title' => 'required|string|max:255',
			'content' => 'required|string|max:255',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		if($request->post('id')>0){
			$model=Post::find($request->post('id'));
			$msg="Blog Updated Successfuly";
		}else{
			$model= new Post();
			$msg="Blog Inserted Successfuly";
		}
		$banner = new Post();
		$banner->title = $request->title;
		$banner->content = $request->content;

		// Upload image if provided
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$path = $file->store('blogs', 'public'); 
			$banner->image = $path;
		}

		$banner->save();
		$request->session()->flash('message',$msg);
		return redirect('admin/blog');
		
	   
	}

    public function updateblog(){
	  return view('admin_view.blog.create');
	}
	
    public function delete(Request $req,$id)
    {
     
    $model=Post::find($id);
    $model->delete();
    $req->session()->flash('message','Blog Deleted Successfuly!');
    return redirect('admin/blog');
      
          
    }
	
	public function toggleStatus($id)
	{
		$banner = Post::find($id);
		$banner->status = !$banner->status;
		$banner->save();

		$status = $banner->status ? 'enabled' : 'disabled';
		return redirect()->back()->with('message', "Blog {$status} successfully!");
	   
	}
}

<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\DatabaseModel;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Session;
class FrontController extends Controller
{
	protected $databaseModel;

    public function __construct(DatabaseModel $databaseModel)
    {
        $this->databaseModel = $databaseModel;
    }
    public function index(Request $req){
		 $banners= Banner::all(); 
		 $categories= Category::all();
         $topSellingItems= Product::orderBy('id', 'desc')->take(6)->get();	
         $logo = $this->databaseModel->websiteInfo('logo');
         $company_name= $this->databaseModel->websiteInfo('company_name');
         $company_email = $this->databaseModel->websiteInfo('company_email');
		 $company_mobile = $this->databaseModel->websiteInfo('company_mobile');
         $company_address = $this->databaseModel->websiteInfo('company_address');		 
         $cart = session()->get('cart', []);
        return view('front.pages.index',compact('banners','categories','topSellingItems','logo','company_name','company_email','company_mobile','company_address','cart'));
    }
	
	public function shop(){
		$result['products'] = Product::all();
		
		return view('front.pages.shop',$result);
	}

    public function productShow($id)
{
    

    $product = Product::findOrFail($id); 
   
    return response()->json($product);
} 

public function successPage(){
    
    $username = 'JohnDoe';
    $password = '12345678';
    
    return view('front.pages.auth.success', compact('username', 'password'));
}

	
public function happynewyear(){
    
    return view('front.pages.happynew');
}


	
}

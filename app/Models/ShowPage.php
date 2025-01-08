<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\WebsiteInfo;


class ShowPage extends Model
{
    use HasFactory;

    public function userPanel($page, $data = [])
    {
        if (Session::has('user_login')) {
            $data['search_parameter'] = "search";
            $panel = WebsiteInfo::get('user_panel');
            $panelDirectory = WebsiteInfo::get('panel_directory');
            $data['panel_url'] = url($panelDirectory . '/' . $panel . '/');
            $data['panel_path'] = url(WebsiteInfo::get('panel_path') . '/');
            
            return view($panelDirectory . '/' . $panel . '/header', $data)
                   ->with('content', view($panelDirectory . '/pages/' . $page, $data))
                   ->with('footer', view($panelDirectory . '/' . $panel . '/footer', $data));
        } else {
            Session::put('login_redirect', url()->current());
            Session::flash('error', "Please Login First.");
            return redirect('login');
        }
    }
	
	
	
		public function adminPanel($page, $data = [])
	{
		if (Session::has('admin_login')) {
			$data['search_parameter'] = "search";
			$panel = WebsiteInfo::get('admin_panel');
			$adminDirectory = WebsiteInfo::get('admin_directory');
			$data['panel_url'] = url($adminDirectory . '/' . $panel . '/');
			$data['admin_path'] = url(WebsiteInfo::get('admin_path') . '/');

			if (Session::get('admin_type') == 'subadmin') {
				$adminRights = json_decode(Session::get('admin_rights'));
				$pagePath = request()->path();
				
				if (in_array($pagePath, $adminRights)) {
					return view($adminDirectory . '/' . $panel . '/header', $data)
						   ->with('content', view($adminDirectory . '/pages/' . $page, $data))
						   ->with('footer', view($adminDirectory . '/' . $panel . '/footer', $data));
				} else {
					return redirect($adminDirectory . '/dashboard');
				}
			} else {
				return view($adminDirectory . '/' . $panel . '/header', $data)
					   ->with('content', view($adminDirectory . '/pages/' . $page, $data))
					   ->with('footer', view($adminDirectory . '/' . $panel . '/footer', $data));
			}
		} else {
			Session::put('login_redirect', url()->current());
			Session::flash('error', "Please Login First.");
			return redirect(WebsiteInfo::get('admin_path') . '/login');
		}
	}

	 public function main($page, $data = [])
	{
		$data['search_parameter'] = "search";
		$panel = WebsiteInfo::get('main_theme');
		$mainDirectory = WebsiteInfo::get('main_directory');
		$data['panel_url'] = url($mainDirectory . '/' . $panel . '/');

		$mainPages = ['register', 'login', 'forgot', 'verify', 'change_password', 'Companyprofile'];

		return view($mainDirectory . '/' . $panel . '/header', $data)
			   ->with('content', in_array($page, $mainPages)
								? view($mainDirectory . '/pages/' . $page, $data)
								: view($mainDirectory . '/' . $panel . '/' . $page, $data))
			   ->with('footer', view($mainDirectory . '/' . $panel . '/footer', $data));
	}


	
}

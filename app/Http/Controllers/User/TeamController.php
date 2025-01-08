<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use App\Models\DummyCarry;
use App\Models\Rank;
use App\Models\Team;
use App\Models\User;

class TeamController extends Controller
{
    

        public function teamDirect(Request $request)
        {
            $userId = auth()->id(); 
            
            $query = DB::table('users')
                ->where('u_sponsor', $userId);
    
           // Pagination
            
            $data = $query->paginate(10);
    
            // Pass data to the view
            return view('user.pages.team.direct', [
                'Directsdata' => $data,
                'select_status' => $request->get('active_status'),
            ]);
        }


      
        
        public function teamGeneration(Request $request)
        {
            $myId = auth()->id();  
            $teamModel = new Team();
            
            
            $checkMyLevelTeam = $teamModel->myGeneration($myId);

            
            $selectedUser = $request->input('selected_user', $myId);

            
            if ($selectedUser != $myId && !in_array($selectedUser, $checkMyLevelTeam)) {
                return redirect()->route('user-teams', ['selected_user' => $myId]);
            }

            
            $selectedLevel = $request->input('selected_level', '1');
            
        
            $genTeam = $selectedLevel !== 'all' ? $teamModel->myLevelTeam($selectedUser, $selectedLevel) : $teamModel->myGeneration($selectedUser);

        
            $conditions = [];
            if (!empty($genTeam)) {
                $conditions['id'] = $genTeam;  

                
                $users = User::whereIn('id', $genTeam)->paginate(10);
            } else {
            
                $users = collect(); 
            }



            
           
            return view('user.pages.team.generation', [
                'Teamusers' => $users,
                'checkMyLevelTeam' => $checkMyLevelTeam,
                'selectedStatus' => $request->input('user_status'),
                'selectedUser' => $selectedUser,
                
            ]);
        }

        
       
    
}

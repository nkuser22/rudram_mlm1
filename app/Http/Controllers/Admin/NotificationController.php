<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Popup;
use App\Notifications\CustomNotification;
use Illuminate\Support\Facades\DB;
use App\Notifications\UserNotification;
use Notification;

class NotificationController extends Controller
{
	
	public function index(){
		$users = User::all();
		return view('admin_view.notification.notification_add',compact('users'));
	}
	
	
	public function sendNotification(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'message' => 'required|string',
        'users' => 'required|array', // Ensure 'users' is an array
    ]);

    $users = $request->users;
    $notificationTitle = $request->title;
    $notificationMessage = $request->message;

    $notifications = [];
    $currentTime = now();

    if (in_array('all', $users)) {
        // Fetch all user IDs for sending notifications to all users
        $allUserIds = DB::table('users')->pluck('id');
        foreach ($allUserIds as $userId) {
            $notifications[] = [
                'user_id' => $userId,
                'title' => $notificationTitle,
                'message' => $notificationMessage,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ];
        }
    } else {
        // Send notifications to selected users
        foreach ($users as $userId) {
            $notifications[] = [
                'user_id' => $userId,
                'title' => $notificationTitle,
                'message' => $notificationMessage,
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ];
        }
    }

    // Insert notifications in bulk into the notifications table
    DB::table('notifications')->insert($notifications);
	
    $msg="'Notification sent successfully";
    $request->session()->flash('message',$msg);
    return redirect('admin/send-notification');
}


	public function showpopup(){
		$popups = Popup::all();
		return view('admin_view.popup.list_popup',compact('popups'));
	}
	
	
    public function popupadd(){
		
		
		return view('admin_view.popup.popup');
	}

	public function sendPopup(Request $request)
{
    // Validation rules for title, message, and image
    $request->validate([
        'title' => 'required|string',
        'message' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
    ]);

    // Get the values from the request
    $notificationTitle = $request->title;
    $notificationMessage = $request->message;

    // Upload image if provided
    $imagePath = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imagePath = $file->store('popup', 'public');
    }

    // Check if the popup exists by title (or any other unique identifier)
    $popup = DB::table('popups')->where('title', $notificationTitle)->first();

    if ($popup) {
        // If popup exists, update the existing record
        DB::table('popups')
            ->where('id', $popup->id)
            ->update([
                'message' => $notificationMessage,
                'image' => $imagePath,
                'updated_at' => now(),
            ]);
        $msg = "Popup Notification updated successfully!";
    } else {
        // If popup doesn't exist, insert a new record
        DB::table('popups')->insert([
            'title' => $notificationTitle,
            'message' => $notificationMessage,
            'image' => $imagePath,
            'is_read' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $msg = "Popup Notification sent successfully!";
    }

    $request->session()->flash('message', $msg);
    return redirect('admin/send-popup');
}


    public function delete(Request $req,$id){
      $model=Popup::find($id);
      $model->delete();
      $req->session()->flash('message','Popup Deleted Successfuly!');
      return redirect('admin/send-popup');

    }
	
	 public function status(Request $req,$status,$id){
      
      $model=Popup::find($id);
      $model->status=$status;
      $model->save();
      $req->session()->flash('message','Popup Status Updated');
      return redirect('admin/send-popup');

    }
 


}

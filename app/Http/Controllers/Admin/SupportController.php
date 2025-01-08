<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class SupportController extends Controller
{
    // Display all tickets
    public function index()
    {
	    $tickets = Ticket::with('user')->latest()->get();
		
        return view('admin_view.support.support_ticket', compact('tickets'));
    }
	
	
	public function reply(Request $request, $id)
	{
		$request->validate([
			'reply' => 'required|string',
		]);

		DB::table('tickets')
			->where('id', $id)
			->update([
				'reply_remark' => $request->reply,
				'status' => 1,
				'reply_status' => 1,
				'updated_at' => now(),
			]);

		return redirect()->back()->with('message', 'Reply sent successfully!');
	}


	
	
	
	
	// Delete a ticket
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
    
		return redirect('admin/support/pending')->with('message', 'Ticket deleted successfully!.');
    }

    
   
}


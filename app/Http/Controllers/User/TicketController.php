<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    // Display all tickets
    public function index()
    {
		
		
        $tickets = Ticket::with('user')->latest()->get();
		
        return view('user.pages.ticket.ticket_list', compact('tickets'));
    }

    
    public function create()
    {
		$tickets = Ticket::with('user')->latest()->get();
        return view('user.pages.ticket.ticket_add', compact('tickets'));
    }

    // Store a new ticket
    public function addticket(Request $request)
    {
		
		$userid = auth()->id();
		$request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
         $ticketNumber = 'TCK-' . strtoupper(uniqid());
	
        Ticket::create([
            'u_code' => $userid,
			'ticket' => $ticketNumber,
            'subject' => $request->subject,
            'description' => $request->description
        ]);
       return redirect('/user-tickets/create')->with('success', 'Ticket created successfully.');
       
    }

    // Show a single ticket
    public function show($id)
    {
        $ticket = Ticket::with('user')->findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    // Show form to edit a ticket
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    // Update a ticket
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:open,in_progress,closed',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    // Delete a ticket
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}


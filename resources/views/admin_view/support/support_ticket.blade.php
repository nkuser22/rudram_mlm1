@extends('admin_view.main')
@section('content')

<?php
use Illuminate\Support\Facades\DB;
?>

<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Support Ticket</h5>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table ticket-table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span>Ticket Number</span>
                                            </th>

                                            <th>
                                                <span>User ID</span>
                                            </th>
                                            <th>
                                                <span>Date</span>
                                            </th>
                                            <th>
                                                <span>Subject</span>
                                            </th>
                                            <th>
                                                <span>Status</span>
                                            </th>
                                            <th>
                                                <span>Description</span>
                                            </th>
                                            <th>
                                                <span>Options</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                        @php
                                            $user = DB::table('users')->where('id', $ticket->u_code)->first();
                                        @endphp
                                        <tr>
                                            <td>#{{ $ticket->ticket }}</td>
                                            <td>

                                            {{$user->username}}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y') }}</td>
                                            <td>{{ $ticket->subject }}</td>
                                            <td>
                                                @if($ticket->status=='0')
                                                <span> Pending </span>     
                                                @elseif($ticket->status=='1') 
                                                <span> Approved </span>   
                                                @endif    
                                            </td>
                                            <td>{{ $ticket->description }}</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#replyModal-{{ $ticket->id }}">
                                                            <i class="ri-chat-3-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal-{{ $ticket->id }}">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <!-- Reply Modal -->
                                        <div class="modal fade" id="replyModal-{{ $ticket->id }}" tabindex="-1"
                                            aria-labelledby="replyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="replyModalLabel">Reply to Ticket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('tickets.reply', $ticket->id) }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="reply" class="form-label">Reply</label>
                                                                <textarea class="form-control" id="reply" name="reply" rows="4" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Send Reply</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="deleteModal-{{ $ticket->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this ticket?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use App\Models\DatabaseModel;
class OrderController extends Controller
{
	protected $pageLimit;

    public function __construct()
    {
        
        $this->pageLimit = 10;
    }
    
    public function index(Request $request)
    {
    
	   $query = Order::query();	
        
		if ($request->filled('from_date') && $request->filled('to_date')) {
			$query->whereBetween('created_at', [
				$request->from_date,
				$request->to_date,
			]);
		}
		 // Apply status filter if provided
		 if ($request->has('status') && $request->status !== '') {
			$query->where('status', $request->status);
		}

	    $orders = $query->paginate($this->pageLimit);

		$result['data']=$orders;
        return view('admin_view.orders.order_list',$result);
    }
	
	public function show($orderId)
    {
    
    $order = DB::table('orders')->where('id', $orderId)->first();

    
    $orderItems = DB::table('order_items')->where('order_id', $orderId)->get();

    
    $shippingDetails = DB::table('shipping_addresses')->where('order_id', $orderId)->first();

    
    return view('admin_view.orders.order_detail', compact('order', 'orderItems', 'shippingDetails'));
        
    }
	
		
	
	public function updateStatus(Request $request, Order $order)
	{
		$request->validate([
        'order_status' => 'required|in:0,1,2,3,4',
        ]);
		
		
		OrderHistory::create([
			'order_id' => $order->id,
			'status' => $order->status, 
			'changed_at' => now(), 
			'remarks' => 'Status changed to ' . $this->getStatusName($order->status), 
		]);

		// Update the order status
		$order->status = $request->order_status;
		$order->save();
		
        
		return redirect()->back()->with('message', 'Order status updated successfully.');
	}
   
   
	
	private function getStatusName($status)
	{
		$statusNames = [
			0 => 'Pending',
			1 => 'Approved',
			2 => 'Shipped',
			3 => 'Delivered',
			4 => 'Completed',
		];

		return $statusNames[$status] ?? 'Unknown';
	}

	public function showOrderTracking($orderId)
	{
				
		$order = DB::table('orders')
			->where('orders.id', $orderId)
			->first();

		
		$orderHistories = DB::table('order_histories')
			->where('order_histories.order_id', $orderId)
			->get();

		
		if (!$order) {
			
			return redirect()->route('admin_view.orders.order_list')->with('error', 'Order not found');
		}

			
		return view('admin_view.orders.tracking', compact('order','orderHistories'));
	}


    

	public function downloadOrders()
	{
		$orders = Order::all(); 
		$csvData = "Order ID, Invoice No., Date, Amount , Payment Option \n";

		foreach ($orders as $order) {
			$csvData .= "{$order->id}, {$order->invoice_no},{$order->date}, {$order->order_amount},{$order->payment_option}\n";
		}

		$fileName = "orders_" . now()->format('Y-m-d_H-i-s') . ".csv";

		return Response::make($csvData, 200, [
			'Content-Type' => 'text/csv',
			'Content-Disposition' => "attachment; filename=\"$fileName\"",
		]);
	}

	public function invoice($id){

		$Conn = new DatabaseModel();
		$currency=$Conn->websiteInfo('currency');
        $order = Order::find($id);
        $orderDetails = json_decode($order->order_details, true);
		
		return view('admin_view.orders.invoice',compact('order', 'orderDetails','currency'));
	}


   
   
}

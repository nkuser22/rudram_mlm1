<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\PaymentMethod;   

class PaymentMethodController extends Controller
{
    

    public function edit($id)
    {
        $paymentMethod = DB::table('payment_method')
            
            ->where('status', 0)
            ->get();

    
        return view('admin_view.settings.paymentEdit', compact('paymentMethod'));
    }
    


    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'addresses' => 'required|array',
            'addresses.*.id' => 'required|integer|exists:payment_method,id', // Validating each ID
            'addresses.*.address' => 'required|string',
            'addresses.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        
        foreach ($request->addresses as $addressData) {
            $paymentMethodId = $addressData['id'];
            
            
            $updateData = [
                'address' => $addressData['address'],
            ];
    
            
            if (isset($addressData['image'])) {
               
                $currentImage = DB::table('payment_method')->where('id', $paymentMethodId)->value('image');
                
                
                if ($currentImage) {
                    // Storage::disk('public')->delete($currentImage);
                }
    
                
                $imagePath = $addressData['image']->store('payment-methods', 'public');
                 
                 $imageUrl = url('/storage/' . $imagePath);

                 
                 $updateData['image'] = $imageUrl;
            }
    
            
            DB::table('payment_method')
                ->where('id', $paymentMethodId)
                ->update($updateData);
        }
    
        
        return redirect()->route('payment-method.edit', $paymentMethodId)
        ->with('message', 'Payment method updated successfully.');
        
    }
    
    
}

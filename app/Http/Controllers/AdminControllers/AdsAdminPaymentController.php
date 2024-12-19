<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\AdsPayment;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsAdminPaymentController extends Controller
{
    public function index()
    {
        $payments = AdsPayment::with('ad.user')->latest()->paginate(10);
        return view('admin_dashboard.ads_payment.index', compact('payments'));
    }

    public function create()
    {
        $ads = Ads::all();
        return view('admin_dashboard.ads_payment.create', compact('ads'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'amount' => 'required|numeric|min:0',
            'deposit' => 'nullable|numeric|min:0',
            'paid_amount' => 'nullable|numeric|min:0',
            'payment_status' => 'required|in:pending,completed,failed',
            'payment_method' => 'required|in:VNPay,bank_transfer,other',
            'paid_at' => 'nullable|date',
        ]);

        AdsPayment::create($validated);

        return redirect()->route('admin.ads_payment.index')->with('success', 'Payment record created successfully.');
    }

    public function edit($id)
    {
        $payment = AdsPayment::findOrFail($id);
        $ads = Ads::all();
        return view('admin_dashboard.ads_payment.edit', compact('payment', 'ads'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'paid_amount' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,completed,failed',
            'payment_method' => 'required|in:VNPay,bank_transfer,other',
            'paid_at' => 'nullable|date',
        ]);
        
        // dd($request->all());

        $payment = AdsPayment::findOrFail($id);
        $payment->update($validated);

        return redirect()->route('admin.ads_payment.index')->with('success', 'Payment record updated successfully.');
    }

    public function destroy($id)
    {
        $payment = AdsPayment::findOrFail($id);
        $payment->delete();

        return redirect()->route('admin.ads_payment.index')->with('success', 'Payment record deleted successfully.');
    }
}


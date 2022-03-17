<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Billing;

class BillingController extends Controller
{
    public function index() {
        $billings = Billing::all();
        return view('backend.billing.index', compact('billings'));
    }

    public function checkout($billing_id) {
        $plan = Billing::findOrFail($billing_id);
        return view('backend.billing.checkout', compact('plan'));
    }
}

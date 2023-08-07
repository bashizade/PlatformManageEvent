<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Invoice\InvoiceCreateRequest;
use App\Http\Requests\Panel\Invoice\InvoiceDeleteRequest;
use App\Http\Requests\Panel\Invoice\InvoiceUpdateRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::query()->where('user_id',Auth::id())->get();
        return view('panel.invoices',compact('invoices'));
    }

    public function create(InvoiceCreateRequest $request)
    {

    }

    public function update(InvoiceUpdateRequest $request)
    {

    }

    public function delete(InvoiceDeleteRequest $request)
    {

    }
}

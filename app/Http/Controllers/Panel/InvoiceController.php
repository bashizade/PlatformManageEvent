<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Invoice\InvoiceCreateRequest;
use App\Http\Requests\Panel\Invoice\InvoiceDeleteRequest;
use App\Http\Requests\Panel\Invoice\InvoiceUpdateRequest;
use App\Models\Event;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::query()->where('user_id',1)->get();
        $events = Event::query()->where('status',1)->get();
        return view('panel.invoices',compact('invoices','events'));
    }

    public function create(InvoiceCreateRequest $request)
    {
        $validate_data = $request->validated();

        $validate_data['user_id'] = Auth::id();
        $validate_data['patch_file'] = asset('files/'.$request->patch_file->store('invoices'));
        $validate_data['status'] = 1;

        Invoice::query()->create($validate_data);

        $this->show_message('فاکتور با موفقیت صادر شد');

        return redirect(route('panel.invoice.index'));
    }

    public function update(InvoiceUpdateRequest $request,Invoice $invoice)
    {
        if ($invoice->user_id != Auth::id())
            abort(403,'شما اجازه دسترسی به این محتوا را ندارید');

        $validate_data = $request->validated();

        if ($validate_data['patch_file'])
            $validate_data['patch_file'] = asset('files/'.$request->patch_file->store('invoices'));

        $invoice->update($validate_data);

        $this->show_message('فاکتور با موفقیت ویرایش شد');

        return redirect(route('panel.invoice.index'));
    }

    public function delete(InvoiceDeleteRequest $request,Invoice $invoice)
    {
        $invoice->delete();

        $this->show_message('فاکتور با موفقیت حذف شد');

        return redirect(route('panel.invoice.index'));
    }

    public function change_status(Request $request, Invoice $invoice)
    {
        $validate_data = $request->validate([
            'status' => 'required'
        ]);
        $invoice->update($validate_data);

        $this->show_message('وضعیت فاکتور با موفقیت تغییر کرد');

        return redirect(route('panel.invoice.index'));
    }
}

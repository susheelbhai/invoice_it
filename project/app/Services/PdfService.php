<?php


namespace App\Services;

use App\Helpers\Helper;
use PDF;
use App\Models\Payment;
use App\Models\Invoice;

class PdfService
{

  public function taxInvoice($payment_id, $copy)
  {
     $payment_detail = Invoice::where('id', $payment_id)->with('products', 'payment', 'businessState', 'customerState')->first();
      $invoice_number = Helper::invoiceNumber($payment_detail);
    // $payment_detail->update([
    //   'invoice_number' => $invoice_number,
    //   'supply_state_id'=>$payment_detail['patientInfo']['state']->state_id,
    //   'company_gstin'=>$payment_detail['originState']->gstin,
    // ]);
    $payment_invoice = PDF::loadView('pdf.invoice', ['data' => $payment_detail, 'copy'=>$copy]);
    $payment_invoice->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);

    $this->applyWatermark($payment_invoice);
    // return view('pdf.invoice', ['data' => $payment_detail, 'copy'=>$copy]);

    return $payment_invoice->stream();
    $invoice = $invoice_number.'_'.$copy . '.pdf';

    $payment_receipt_save = $payment_invoice->save(public_path('storage/documents/pdf/invoice/' . $invoice));
    if ($payment_receipt_save) {
      if ($copy=='original') {
      Payment::where('payment_id', $payment_detail->payment_id)->update(['invoice_original' => $invoice]);
      } else {
      Payment::where('payment_id', $payment_detail->payment_id)->update(['invoice_duplicate' => $invoice]);
      }
      
    }
  }

  private function applyWatermark($data)
  {

    if (env('APP_ENV') == 'local') {
      $data->output();
      $id_front_wm = $data->getDomPDF()->getCanvas();
      $height = $id_front_wm->get_height();
      $width = $id_front_wm->get_width();
      $id_front_wm->set_opacity(.2, "Multiply");
      $id_front_wm->set_opacity(.2);
      $id_front_wm->page_text($width / 5, $height / 2, 'Test PDF', null, 55, array(0, 0, 0), 2, 2, -30);
    }
  }
}

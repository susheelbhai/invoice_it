<?php


namespace App\Services;

use PDF;
use App\Models\Invoice;

class PdfService
{

  public function taxInvoice($payment_id, $copy)
  {
    $invoice_detail = Invoice::where('id', $payment_id)->with('products', 'payment', 'businessState', 'customerState')->firstOrFail();
    $payment_invoice = PDF::loadView('pdf.invoice', ['data' => $invoice_detail, 'copy'=>$copy]);
    $payment_invoice->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
    $this->applyWatermark($payment_invoice);
    return $payment_invoice->stream($invoice_detail['invoice_number'].'_'.$copy.'.pdf');
  }

  private function applyWatermark($data)
  {
    if (config('app.env') == 'local') {
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

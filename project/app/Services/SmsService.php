<?php


namespace App\Services;

class SmsService
{

  public function send($data)
  {
    if (config('sms.sms_provider') == 'fast2sms' && config('sms.send_sms') == 1) {
      $fields = array(
        "sender_id" => config('sms.dlt_sender_id'),
        "message" => $data['template_id'],
        "variables_values" => $data['variables'],
        "route" => "dlt",
        "numbers" => $data['to'],
      );

      $curl = curl_init();
      $YOUR_API_KEY = config('sms.fast2sms.key');
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
          "authorization: $YOUR_API_KEY",
          "accept: */*",
          "cache-control: no-cache",
          "content-type: application/json"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        $result = $err;
      } else {
        $result = $response;
      }
    }
    return $data;
  }

  public function check_balance()
  {
    if (config('sms.sms_provider') == 'fast2sms' && config('sms.send_sms') == 1) {
      $curl = curl_init();
      $YOUR_API_KEY = config('sms.fast2sms.key');

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/wallet",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
          "authorization: $YOUR_API_KEY"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return json_decode($response);
      }
    }
  }
}

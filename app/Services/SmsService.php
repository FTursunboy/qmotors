<?php

namespace App\Services;

use App\Services\Contracts\SmsServiceInterface;
use Illuminate\Support\Facades\Http;

class SmsService implements SmsServiceInterface
{
  const STARTSESSION = 'StartSession';
  const SENDSMS = 'SendSMS';
  private $config;
  private $session;
  public function __construct()
  {
    $this->config = collect(config('sms'));
    // $this->startSession();
  }

  public function send($phone, $text)
  {
    $response = Http::asForm()->post($this->config['url'] . '/' . self::SENDSMS, [
      'Login' => $this->config['Login'],
      'Password' => $this->config['Password'],
      'Source' => '',
      'Phone' => $phone,
      'Text' => $text,
    ]);
    return $response->status();
    // $xml = @simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
    // $json = json_encode($xml);

    // // array
    // $array = json_decode($json, true);
    // dd($array);
  }

  public function startSession()
  {
    $response = Http::asForm()->post($this->config['url'] . '/StartSession', $this->config->only('Login', 'Password', 'Gmt')->all());
    $xml = @simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json, true);
    $this->session = $array[0];
  }
}

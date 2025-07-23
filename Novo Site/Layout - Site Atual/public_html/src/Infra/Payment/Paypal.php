<?php

namespace App\Infra\Payment;

class Paypal
{
    private array $requestHeaders = [
        'User-Agent: PHP-IPN-Verification-Script',
        'Connection: Close',
    ];
    const VALID = "VERIFIED";
    const INVALID = "INVALID";

    public function buildRequestBody(array $dataFromRequest): string
    {
        $body = 'cmd=_notify-validate';

        foreach ($dataFromRequest as $key => $value) {
            $value = urlencode($value);
            $body .= "&{$key}={$value}";
        }

        return $body;
    }

    public function validateRequest(string $bodyRequest): bool
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_POST           => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS     => $bodyRequest,
            CURLOPT_SSLVERSION     => 6,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_URL            => PAYPAL_ENDPOINT,
            CURLOPT_HTTPHEADER     => $this->requestHeaders, 
            CURLOPT_FORBID_REUSE   => 1,
            CURLOPT_CONNECTTIMEOUT => 30
        ]);

        $rawResponse = curl_exec($curl);

        if (!$rawResponse) {
            curl_close($curl);
            throw new \Exception("Falha ao enviar requisição PayPal.");
        }
        
        if ($rawResponse == self::VALID) {
            return true;
        }

        return false;
    }
}
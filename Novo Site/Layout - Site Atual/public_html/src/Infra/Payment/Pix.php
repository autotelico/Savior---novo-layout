<?php

/**
 * Desenvolvido para uso com api da PagHiper
 * !!!!!! NÃO SEGUE OS PADRÕES DO BACEN !!!!!!
 */

namespace App\Infra\Payment;

use App\Entity\Account\Account;
use App\Entity\Shop\Order;
use App\Helper\Feedback;

class Pix
{
    private array $requestHeaders = [
        "Accept: application/json",
        "Accept-Charset: UTF-8",
        "Accept-Encoding: application/json",
        "Content-Type: application/json; charset=UTF-8"
    ];

    public function __construct(
        private ?Order $order,
        private ?Account $account,
        private string $payerName = '',
        private string $payerCPF = ''
    ){}

    private function buildRequestBody(): string
    {
        return json_encode([
            "apiKey"           => PIX_PUBLIC_KEY,
            "order_id"         => $this->order->getDisplayID(),
            "payer_email"      => (string) $this->account->getEmail(),
            "payer_name"       => $this->payerName,
            "payer_cpf_cnpj"   => $this->payerCPF,
            "days_due_date"    => PIX_ORDER_EXPIRE,
            "notification_url" => PIX_CALLBACK_NOTIFICATION, //TODO
            "items" => [
                [
                    "item_id"      => $this->order->getDisplayID(),
                    "description"  => PIX_DESCRIPTION,
                    "quantity"     => 1,
                    "price_cents"  => number_format($this->order->getPrice(), 2, '')
                ]
            ]
        ]);
    }

    public function requestCreateInvoice(): string
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => PIX_ENDPOINT_CREATE,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $this->buildRequestBody(),
            CURLOPT_HTTPHEADER     => $this->requestHeaders, 
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        
        $rawResponse = curl_exec($curl);
        $response = json_decode($rawResponse, true); 
        
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if($httpCode != 201) {
            error_log("O retorno da PagHiper não foi 201. Retornado: {$httpCode}");
            throw new \Exception(Feedback::FAILED_TO_CREATE_PIX_INVOICE->value);
        }

        if (!isset($response['pix_create_request'])) {
            //Talvez seja interessante uma notificação para a administração.
            error_log("Resposa não definida.");
            throw new \Exception(Feedback::FAILED_TO_CREATE_PIX_INVOICE->value);
        }

        return $response['pix_create_request']['transaction_id'];
    }

    public function requestInvoiceDetails(): array
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => PIX_ENDPOINT_STATUS,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode([
                "token"          => PIX_PRIVATE_KEY,
                "apiKey"         => PIX_PUBLIC_KEY,
                "transaction_id" => $this->order->getTransactionID()
            ]),
            CURLOPT_HTTPHEADER     => $this->requestHeaders, 
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $rawResponse = curl_exec($curl);
        $response = json_decode($rawResponse, true); 
        curl_close($curl);

        return $response;
    }

    public function checkPagHiperPostNotification(array $dataFromRequest): void
    {
        $apiKey = $dataFromRequest['apiKey'];
        // $transactionID = $dataFromRequest['transaction_id'];
        // $notificationID = $dataFromRequest['notification_id'];
        // $date = $dataFromRequest['notification_date'];
        // $source = $dataFromRequest['source_api'];

        if ($apiKey !== PIX_PUBLIC_KEY) {
            throw new \UnexpectedValueException("apiKey não confere.");
        }
    }

    private function buildPagHiperNotificationBody(string $transactionID, string $notificationID): string
    {
        return json_encode([
            'token'           => PIX_PRIVATE_KEY,
            'apiKey'          => PIX_PUBLIC_KEY,
            'transaction_id'  => $transactionID,
            'notification_id' => $notificationID
        ]);
    }

    public function processPagHiperNotification(array $dataFromRequest): mixed
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => PIX_ENDPOINT_NOTIFICATION,
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $this->buildPagHiperNotificationBody($dataFromRequest['transaction_id'], $dataFromRequest['notification_id']),
            CURLOPT_HTTPHEADER     => $this->requestHeaders, 
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $rawResponse = curl_exec($curl);
        $response = json_decode($rawResponse, true);
        curl_close($curl);

        if (!isset($response['status_request']) || empty($response['status_request'])) {
            throw new \UnexpectedValueException("Falha ao processar notificação.");
        }

        return $response;
    }

}
namespace App\Controller;

class PaymentController
{
    private $paymentService;
    private $view;

    public function __construct($paymentService, $view)
    {
        $this->paymentService = $paymentService;
        $this->view = $view;
    }

    public function processPayment(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        
    }
}
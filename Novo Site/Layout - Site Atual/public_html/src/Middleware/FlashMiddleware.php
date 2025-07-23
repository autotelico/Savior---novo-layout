<?php

namespace App\Middleware;

use App\Helper\Flash;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class FlashMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        $flash = Flash::getMsg();
        
        if ($flash) {
            $response->getBody()->write(
                "
                <style>
                .colored-toast.swal2-icon-success {
                    background-color: #448c1a !important;
                }
                
                .colored-toast.swal2-icon-error {
                    background-color: #ab1919 !important;
                }
                
                .colored-toast.swal2-icon-warning {
                    background-color: #f8bb86 !important;
                }
                
                .colored-toast.swal2-icon-info {
                    background-color: #3fc3ee !important;
                }
                
                .colored-toast.swal2-icon-question {
                    background-color: #87adbd !important;
                }
                
                .colored-toast .swal2-title {
                    color: white;
                }
                
                .colored-toast .swal2-close {
                    color: white;
                }
                
                .colored-toast .swal2-html-container {
                    color: white;
                }
                </style>
                <script>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-right',
                        iconColor: 'white',
                        customClass: {
                            popup: 'colored-toast'
                        },
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true
                    });
                    Toast.fire({
                        icon: '{$flash[1]}',
                        title: '{$flash[0]}'
                    });
                </script>
                "
            );
        }
    
        return $response;
    }
}
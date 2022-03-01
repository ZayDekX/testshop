<?php

class OrderController extends Controller
{
    #[HttpRequestHandler(HTTP_POST)]
    public function create_order(string ...$request):string
    {
        http_response_code(201);
        
        return "order created";
    }
}
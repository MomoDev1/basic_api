<?php


namespace App\Controller;


use App\Core\Controller;
use App\Core\Router\Route;


class ExampleController extends Controller
{
    #[Route('/', method: 'get')]
    public function index()
    {
        return 'Hi I \'m basic API';
    }
}
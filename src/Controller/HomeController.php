<?php  

namespace App\Controller;

final class HomeController extends AbstractController
{
    public function indexAction() {
        $this->render('home/index.html.twig');
    }
}
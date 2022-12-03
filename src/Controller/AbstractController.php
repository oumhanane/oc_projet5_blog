<?php  

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    public function render (string $path, array $data = []) {
        $loader = new FilesystemLoader('../Views');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render($path, $data);
        exit();

    }

    public function optionalParameters(string $path, string $param = 'hello') {

    }

    public function optionalParameters2(string $param = null) {

    } 
}

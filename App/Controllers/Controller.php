<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Controller{
    public $container;
    public $db;

    public function __construct($container)
    {
		if($container->config['components']['db'] == true) {
			$this->db = $container->db;
		}
        $this->container = $container;
    }

    public function render(ResponseInterface $response, $file, $params = []){
        $this->container->view->render($response, $file, $params);
    }

    protected function postQuery($request){
        return $request->getParsedBody();
    }
}
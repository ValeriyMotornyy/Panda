<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface as Logger;
use App\Helpers\JsonHelper;
use App\Loader\Language;
use App\Models\Profile;

/**
* @abstract Profile Controller
*/
class ProfileController
{
    private $view;
    private $lang;
    private $model;
    private $logger;

    public function __construct(Twig $view)
    {
        $this->view   = $view;
        $this->logger = $logger;
        $this->model  = new Profile();
    }

    public function profile(Request $request, Response $response)
    {
        $data = json_decode($this->model->profile());

        return $this->view->render($response, 'single.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => JsonHelper::toArray($data)
        ]);
    }
}

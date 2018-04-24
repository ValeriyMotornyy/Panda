<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface as Logger;
use App\Helpers\JsonHelper;
use App\Loader\Language;
use App\Models\Encoder;

/**
* @abstract Encoder Controller
*/
class EncoderController
{
    private $view;
    private $lang;
    private $model;
    private $logger;

    public function __construct(Twig $view)
    {
        $this->view   = $view;
        $this->logger = $logger;
        $this->model  = new Encoder();
    }

    public function encoding(Request $request, Response $response)
    {
        $data = json_decode($this->model->encoding());

        return $this->view->render($response, 'single.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => JsonHelper::toArray($data)
        ]);
    }

    public function encodings(Request $request, Response $response)
    {
        $data = json_decode($this->model->encodings('success'));

        return $this->view->render($response, 'single.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => JsonHelper::toArray($data[0]),
            'count'  => count($data)
        ]);
    }
}

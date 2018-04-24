<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface as Logger;
use App\Helpers\JsonHelper;
use App\Loader\Language;
use App\Models\Video;

/**
* @abstract Video Controller
*/
class VideoController
{
    private $view;
    private $lang;
    private $model;
    private $logger;

    public function __construct(Twig $view)
    {
        $this->view   = $view;
        $this->logger = $logger;
        $this->model  = new Video();
    }

    public function index(Request $request, Response $response)
    {
        return $this->view->render($response, 'index.twig');
    }

    public function video(Request $request, Response $response)
    {
        $data = json_decode($this->model->video());

        return $this->view->render($response, 'single.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => JsonHelper::toArray($data)
        ]);
    }

    public function videos(Request $request, Response $response)
    {
        $data = json_decode($this->model->videos());

        return $this->view->render($response, 'single.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => JsonHelper::toArray($data[0]),
            'count'  => count($data)
        ]);
    }

    public function metaData(Request $request, Response $response)
    {
        $data = json_decode($this->videoModel->metadata());

        return $this->view->render($response, 'single.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => JsonHelper::toArray($data)
        ]);
    }

    public function encodings(Request $request, Response $response)
    {
        $data = json_decode($this->model->encodings());
        $encoder = [];
        foreach ($data as $item) {
            $encoder[] = JsonHelper::toArray($item);
        }

        return $this->view->render($response, 'multiple.twig', [
            'title'  => $this->lang[__FUNCTION__]['title'],
            'desc'   => $this->lang[__FUNCTION__]['desc'],
            'object' => $encoder,
            'count'  => count($data)
        ]);
    }
}

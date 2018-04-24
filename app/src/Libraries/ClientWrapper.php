<?php
namespace App\Libraries;

use App\Libraries\PandaClient;
use Xabbuh\PandaClient\Api;

/**
* @abstract Client Wrapper
*/
class ClientWrapper
{
    protected $panda;

    public function __construct()
    {
        $this->panda = new PandaClient([
            'api_host'   => getenv('API_HOST'),
            'cloud_id'   => getenv('CLOUD_ID'),
            'access_key' => getenv('ACCESS_KEY'),
            'secret_key' => getenv('SECRET_KEY'),
            'api_port'   => 443
        ]);
    }
}

<?php
namespace App\Models;

use App\Libraries\ClientWrapper;

/**
* @abstract Encoder Model
*/
class Encoder extends ClientWrapper
{
    private $encodingId;
    private $endpoint = 'encodings';
    private $extension = 'json';

    public function __construct($encodingId = NULL)
    {
        $this->encodingId = getenv('ENCODING_ID');
        parent::__construct();
    }

    /**
    * @abstract Retrieving Encodings on status ('processing', 'success')
    *
    * @return json
    */
    public function encodings($status)
    {
        return $this->$status();
    }

    /**
    * @abstract etrieving a specific encoding by id
    *
    * @return json
    */
    public function encoding()
    {
        return $this->panda->get(
            "/{$this->endpoint}/{$this->encodingId}.{$this->extension}"
        );
    }

    /**
    * @abstract Retrieving encodings with status = processing
    *
    * @return json
    */
    public function processing()
    {
        return $this->panda->get(
            "/{$this->endpoint}.{$this->extension}", [
              'status' => __FUNCTION__
            ]
        );
    }

    /**
    * @abstract Retrieving encodings with status = success
    *
    * @return json
    */
    public function success()
    {
        return $this->panda->get(
            "/{$this->endpoint}.{$this->extension}", [
                'status'   => __FUNCTION__,
                'per_page' => 1,
                'page'     => 1
            ]
        );
    }
}

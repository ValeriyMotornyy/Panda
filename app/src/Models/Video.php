<?php
namespace App\Models;

use App\Libraries\ClientWrapper;

/**
* @abstract Video Model
*/
class Video extends ClientWrapper
{
    private $videoId;
    private $endpoint = 'videos';
    private $extension = 'json';

    public function __construct()
    {
        $this->videoId = getenv('VIDEO_ID');
        parent::__construct();
    }

    /**
    * @abstract Retrieving videos (last 100 by default)
    *
    * @return json
    */
    public function videos()
    {
        return $this->panda->get(
            "/{$this->endpoint}.{$this->extension}"
        );
    }

    /**
    * @abstract Retrieving a specific video by id
    *
    * @return json
    */
    public function video()
    {
        return $this->panda->get(
            "/{$this->endpoint}/{$this->videoId}.{$this->extension}"
        );
    }

    /**
    * @abstract Retrieving encoding profiles related to a video
    *
    * @return json
    */
    public function encodings()
    {
        return $this->panda->get(
            "/{$this->endpoint}/{$this->videoId}/".__FUNCTION__.".{$this->extension}"
        );
    }

    /**
    * @abstract Retrieving metadata related to a video
    *
    * @return json
    */
    public function metadata()
    {
        return $this->panda->get(
            "/{$this->endpoint}/{$this->videoId}/".__FUNCTION__.".{$this->extension}"
        );
    }
}

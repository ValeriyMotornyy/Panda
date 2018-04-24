<?php
namespace App\Models;

use App\Libraries\ClientWrapper;

/**
* @abstract Profile Model
*/
class Profile extends ClientWrapper
{
    private $profileId;
    private $endpoint = 'profiles';
    private $extension = 'json';

    public function __construct()
    {
        $this->profileId = getenv('PROFILE_ID');
        parent::__construct();
    }

    /**
    * @abstract Retrieving profile by id
    *
    * @return json
    */
    public function profile()
    {
        return $this->panda->get(
            "/{$this->endpoint}/{$this->profileId}.{$this->extension}"
        );
    }
}

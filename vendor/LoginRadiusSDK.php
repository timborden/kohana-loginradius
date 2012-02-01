<?php

class LoginRadiusSDK
{
    public $authenticated = false;

    public $JSONresponse;

    public $user;

    public function __construct($APIsecret)
    {
        if (isset($_REQUEST['token']))
        {
            $this->JSONresponse = file_get_contents(
                "https://hub.loginradius.com/userprofile.ashx?token=".$_REQUEST['token']."&apisecrete=".$APIsecret
            );

            if (isset($this->JSONresponse))
            {
                $this->user = json_decode($this->JSONresponse);

                if(isset($this->user->ID) &&  $this->user->ID != '')
                {
                    $this->authenticated = true;
                }
            }
        }
    }
}

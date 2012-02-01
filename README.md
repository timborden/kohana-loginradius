Kohana 3 module for LoginRadius API

[http://www.loginradius.com/](http://www.loginradius.com/)

Usage:
------

        $response = LoginRadius::instance()->response();

        if($response->authenticated === TRUE)
        {
            echo Debug::vars($response->user);
        }

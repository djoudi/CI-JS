<?php

/**
 * an example of extending a core class... rather than replacing it!
 *
 *
 */
class MY_Input extends CI_Input {

    function __construct()
    {
        parent::__construct();
    }
}
?>
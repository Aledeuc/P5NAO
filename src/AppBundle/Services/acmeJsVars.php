<?php
/**
 */

namespace AppBundle\Services;

use \stdClass;


class acmeJsVars
{
    public $stdClass;

    public function __construct()
    {
        $this->stdClass = new \stdClass();
        return $this->stdClass;
    }

}
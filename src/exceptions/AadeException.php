<?php

namespace Tec\Vat\exceptions;

use Exception;

class AadeException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}

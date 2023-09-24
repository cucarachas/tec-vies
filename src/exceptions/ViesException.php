<?php

namespace Tec\Vat\exceptions;

use Exception;

class ViesException extends Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}

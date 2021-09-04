<?php

namespace App\Exceptions;

use Exception;

class InvalidSiteException extends Exception
{
    protected $message = "Неверный сайт";
}

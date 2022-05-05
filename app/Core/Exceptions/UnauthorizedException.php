<?php
declare(strict_types=1);

namespace App\Core\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    public $message = "Unauthorized";
    public $code = 401;
}

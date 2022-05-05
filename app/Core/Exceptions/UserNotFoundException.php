<?php
declare(strict_types=1);

namespace App\Core\Exceptions;

use Exception;

class UserNotFoundException extends Exception
{
    protected $message = "User not found";
}

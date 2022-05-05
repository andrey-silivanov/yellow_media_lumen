<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Core\Exceptions\RecoverPasswordException;

class ThrottledResetPassword extends RecoverPasswordException
{

}

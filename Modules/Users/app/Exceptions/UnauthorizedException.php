<?php

namespace Modules\Users\App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    public static function notLoggedIn()
    {
        return new static('User is not logged in.');
    }

    public static function invalidUserType()
    {
        return new static('User is not of the expected type.');
    }

    public static function forRole($roles)
    {
        if (is_array($roles)) {
            $roles = implode(', ', $roles);
        }
        return new static("User does not have the required role(s): $roles ");
    }
}

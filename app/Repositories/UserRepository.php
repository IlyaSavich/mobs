<?php

namespace App\Repositories;

class UserRepository
{
    /**
     * Constant which shows how the value denoted administrator role in the database
     */
    const ADMIN_ROLE = true;

    /**
     * Constant which shows how the value denoted user role in the database
     */
    const USER_ROLE = false;

    /**
     * Returns user role value
     * 
     * @return int
     */
    public static function getUserRole()
    {
        return \Auth::user()->role;
    }

    /**
     * Checking is the authenticated user administrator
     *
     * @return bool
     */
    public static function isAdmin()
    {
        return self::getUserRole() == self::ADMIN_ROLE;
    }
}
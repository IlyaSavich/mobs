<?php

namespace App\Services;
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 25.04.2016
 * Time: 16:00
 */
class UserService
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
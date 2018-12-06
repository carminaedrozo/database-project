<?php

use Base\User as BaseUser;

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class User extends BaseUser
{
    function setPasswordHash($password)
    {
        $this->setPassword(password_hash($password, PASSWORD_DEFAULT));
    }

    //method that takes a string password and verifies if it is valid or not
    function login($typedpword)
    {
        if (password_verify($typedpword, $this->getPassword())) {
            return true;
        } else {
            return false;
        }
    }
}

<?php

/**
 * @file
 * Contains \core\Model.
 *
 * Defines an abstract class for models in the application.
 */

namespace core;

use app\Config;

abstract class Model
{
    /**
     * Get the database connection.
     *
     * @return \mysqli|null
     *   The database connection object or null if connection fails.
     *
     * @throws \Exception
     *   Throws an exception if failed to connect to MySQL.
     */
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $db = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_NAME);
            if (mysqli_connect_errno()) {
                throw new \Exception('Failed to connect to MySQL: ' . mysqli_connect_error());
            }
        }

        return $db;
    }
}

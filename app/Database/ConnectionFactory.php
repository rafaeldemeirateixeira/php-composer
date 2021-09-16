<?php

namespace PHP\Composer\Database;

use PHP\Composer\Interfaces\ConnectionFactoryInterface;

class ConnectionFactory implements ConnectionFactoryInterface
{
    public function get()
    {
        return ConnectionSingleton::get();
    }
}

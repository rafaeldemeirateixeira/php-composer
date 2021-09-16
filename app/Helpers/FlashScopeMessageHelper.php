<?php

namespace PHP\Composer\Helpers;

use PHP\Composer\Interfaces\FlashScopeMessageHelperInterface;

class FlashScopeMessageHelper implements FlashScopeMessageHelperInterface
{
    public function setSuccess($message)
    {
        $_SESSION["success"] = $message;
    }

    public function setError($message)
    {
        $_SESSION["error"] = $message;
    }

    public function getSuccess()
    {
        if (isset($_SESSION["success"])) {
            return '<div class="alert alert-info">' . $_SESSION["success"] . '</div>';
        }
    }

    public function getError()
    {
        if (isset($_SESSION["error"])) {
            return '<div class="alert alert-danger">' . $_SESSION["error"] . '</div>';
        }
    }
}

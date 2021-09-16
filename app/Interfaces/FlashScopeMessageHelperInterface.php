<?php

namespace PHP\Composer\Interfaces;

interface FlashScopeMessageHelperInterface
{
    function setSuccess($message);

    function setError($message);

    function getSuccess();

    function getError();
}

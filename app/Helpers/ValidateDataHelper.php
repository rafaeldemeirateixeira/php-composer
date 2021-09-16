<?php

namespace PHP\Composer\Helpers;

class ValidateDataHelper
{
    public function checkString($string, $label = '')
    {
        if (!is_string($string) || empty($string)) {
            throw new \InvalidArgumentException("Argumento $label inválido ou não informado");
        }

        return $this;
    }

    public function checkObject($objeto, $label = '')
    {
        if (!is_object($objeto) || (is_object($objeto) && empty($objeto))) {
            throw new \InvalidArgumentException("Argumento $label inválido ou não informado");
        }

        return $this;
    }

    public function checkArray(array $array, $label = '')
    {
        if (!is_array($array) || (is_array($array) && $array == NULL)) {
            throw new \InvalidArgumentException("Array $label inválido, não informado ou vazio");
        }

        return $this;
    }

    public function checkNumeric($numeric, $label = '')
    {
        if (!is_numeric($numeric) || empty($numeric)) {
            throw new \InvalidArgumentException("Argumento $label inválido, não informado ou vazio");
        }

        return $this;
    }
}

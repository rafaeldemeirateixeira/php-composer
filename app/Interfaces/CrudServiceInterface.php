<?php

namespace PHP\Composer\Interfaces;

interface CrudServiceInterface
{
    function findAll();

    function findById($id);

    function updateById($object);

    function insert($object);

    function deleteById($id);
}

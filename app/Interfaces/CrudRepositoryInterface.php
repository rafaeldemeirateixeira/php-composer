<?php

namespace PHP\Composer\Interfaces;

interface CrudRepositoryInterface
{
    function findAll();

    function findById(int $id);

    function updateById(object $object);

    function insert(object $object);

    function deleteById(int $id);
}

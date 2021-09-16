<?php

namespace PHP\Composer\Models;

use PHP\Composer\Interfaces\PrinteableInterface;

class Customer implements PrinteableInterface
{

    private $id;

    private $name;

    private $nifNumber;

    private $birthDate;

    private $address;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNifNumber($nifNumber)
    {
        $this->nifNumber = $nifNumber;
    }

    public function getNifNumber()
    {
        return $this->nifNumber;
    }

    public function setBirthdate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getHeader()
    {
        return "id \t name \t nif_number \t birth_date \t address ";
    }

    public function getContent()
    {
        return "";
    }
}

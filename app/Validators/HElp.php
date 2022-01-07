<?php

namespace App\Validators;

class HElp
{
    static public string $jwt;

    public function __construct(string $jwt)
    {
        $this->jwt = $jwt;
    }
}

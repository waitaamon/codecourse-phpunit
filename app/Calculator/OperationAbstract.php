<?php

namespace App\Calculator;

abstract class OperationAbstract
{
    protected array $operands = [];

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
}
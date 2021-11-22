<?php

namespace Tests\unit\Calculator;

class DivisionTest extends \PHPUnit\Framework\TestCase
{
    public function test_divides_given_operands()
    {
        $division = new \App\Calculator\Division;

        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    public function test_removes_division_by_zero_operands()
    {
        $division = new \App\Calculator\Division;

        $division->setOperands([10, 0, 0, 5, 0]);

        $this->assertEquals(2, $division->calculate());
    }

    public function test_no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Division;
        $addition->calculate();
    }
}
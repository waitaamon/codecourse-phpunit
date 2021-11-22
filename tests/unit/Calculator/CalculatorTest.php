<?php

namespace Tests\unit\Calculator;

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    public function test_can_set_single_operation()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    public function test_can_set_multiple_operations()
    {
        $addition1 = new \App\Calculator\Addition;
        $addition1->setOperands([5, 10]);

        $addition2 = new \App\Calculator\Addition;
        $addition2->setOperands([2, 2]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    public function test_operations_are_ignored_if_not_instance_of_operation_interface()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, 'abc', 'bcd']);

        $this->assertCount(1, $calculator->getOperations());
    }

    public function test_can_calculate_result()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperation($addition);

        $this->assertEquals(15, $calculator->calculate());
    }

    public function test_can_calculate_multiple_results()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $division = new \App\Calculator\Division();
        $division->setOperands([50, 2]);

        $calculator = new \App\Calculator\Calculator;
        $calculator->setOperations([$addition, $division]);

        $this->assertIsArray($calculator->calculate());
        $this->assertEquals(15, $calculator->calculate()[0]);
        $this->assertEquals(25, $calculator->calculate()[1]);
    }
}
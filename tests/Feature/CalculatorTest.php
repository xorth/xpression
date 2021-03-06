<?php

namespace Test\Feature;

use Xorth\Xpression\Calculator;
use Xorth\Xpression\Evaluators\Postfix;
use PHPUnit\Framework\TestCase;
use Xorth\Xpression\Algorithms\ShuntingYard;
use Xorth\Xpression\Tokenizers\SimpleTokenizer;

class CalculatorTest extends TestCase
{
    protected $calculator;

    public function setUp()
    {
        parent::setUp();

        $this->calculator = new Calculator(
            new SimpleTokenizer(),
            new ShuntingYard(),
            new Postfix()
        );
    }

    /** @test */
    function it_can_sum_two_numbers()
    {
        $expression = "1 + 2";
        $this->assertEquals(3, $this->calculator->read($expression)->evaluate());
    }

    /** @test */
    function it_can_multiply_two_numbers()
    {
        $expression = "1 * 2";
        $this->assertEquals(2, $this->calculator->read($expression)->evaluate());
    }

    /** @test */
    function it_can_evaluate_an_expression_with_multiple_operators()
    {
        $expression = "1 + 2 * 3";

        $this->assertEquals(7, $this->calculator->read($expression)->evaluate());
    }

    /** @test */
    public function it_can_evaluate_a_complex_expression()
    {
        $expression = "8 + ( 4 * 2 ) / ( 4 - 2 ) ^ 2";

        $this->assertEquals(10, $this->calculator->read($expression)->evaluate());
    }
}

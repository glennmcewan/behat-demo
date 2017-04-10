<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use App\Calculator;

class CalculatorContext implements Context
{
    /**
     * App\Calculator instance
     * @var App\Calculator
     */
    protected $calculator;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        //
    }

    /**
     * @Given /^I have a new calculator instance$/
     */
    public function iHaveANewCalculatorInstance()
    {
        $this->calculator = new Calculator;
    }

    /**
     * @When /^I add the number (\d+) and the number (\d+)$/
     */
    public function iAddTheNumberAndTheNumber($first, $second)
    {
        $this->calculator->add((int) $first);
        $this->calculator->add((int) $second);
    }

    /**
     * @Then /^I should see a total of (\d+)$/
     */
    public function iShouldSeeATotalOf($expected)
    {
        $actual = $this->calculator->getSum();
        $expected = (int) $expected;

        if ($actual !== $expected) {
            throw new Exception('Actual total: ' . $actual);
        }

        return $actual;
    }
}

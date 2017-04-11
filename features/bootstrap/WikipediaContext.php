<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class WikipediaContext extends RawMinkContext implements Context
{
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
     * @Given I am on the url :url
     */
    public function iAmOn($url)
    {
        $this->visitPath($url);
    }

    /**
     * @When I search for :searchString
     */
    public function iSearchFor($searchString)
    {
        $this->getSession()->getPage()->fillField('searchInput', $searchString);
        $this->getSession()->getPage()->find('css', '.searchButton')->click();
    }

    /**
     * @When I translate to :language
     */
    public function iTranslateTo($language)
    {
        $map = [
            'dutch'      => 'nl',
            'french'     => 'fr',
            'portuguese' => 'pt',
        ];

        $language = strtolower($language);
        
        if (!array_key_exists($language, $map)) {
            throw new Exception('Language code not mapped.');
        }

        $code = $map[$language];

        $session = $this->getSession();

        $languageChanger = $session->getPage()->find(
            'css',
            "#p-lang .interlanguage-link.interwiki-{$code} a"
        );

        if ($languageChanger === null) {
            throw new Exception('Element not found (dutch language link).');
        }

        $languageChanger->click();
    }

    /**
     * @Then the first heading will be :heading
     */
    public function theFirstHeadingWillBe($heading)
    {
        $pageHeading = $this->getSession()->getPage()->find('css', '.firstHeading');

        if ($pageHeading === null) {
            throw new Exception('Element not found (first heading).');
        }

        if ($pageHeading->getText() !== $heading) {
            throw new Exception('Actual heading: ' . $pageHeading->getText());
        }
    }
}

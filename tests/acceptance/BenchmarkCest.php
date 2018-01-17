<?php

use Facebook\WebDriver\Exception\StaleElementReferenceException;
use \Facebook\WebDriver\WebDriverElement;

class BenchmarkCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function visitOnePostManyTimes(AcceptanceTester $I)
    {
        $paths = [
            '/en/blog/',
            '/en/blog/posts/pellentesque-vitae-velit-ex',
        ];

        $selectors = [];

        foreach ($paths as $path) {
            $selectors[] = 'a[href="' . $path . '"]';
        }

        for ($i = 0; $i < 10; $i++) {
            $I->amOnPage('/');

            foreach ($selectors as $selector) {
                $I->waitForElement($selector);
                $I->click($selector);
            }
        }
    }

    public function visitEveryPostOneTime(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Browse application');

        $I = $this->visitAllPostsOnPage($I);

        $I->click('Next →');

        $I = $this->visitAllPostsOnPage($I);

        $I->click('Next →');

        $I = $this->visitAllPostsOnPage($I);
    }

    /**
     * @param AcceptanceTester $I
     * @return AcceptanceTester
     * @throws Exception
     */
    private function visitAllPostsOnPage(AcceptanceTester $I): AcceptanceTester
    {

        $I->waitForElement('article.post a');

        $staleElement = true;

        while ($staleElement) {
            try {
                $postLinks = $I->grabMultiple(
                    'article.post a'
                );

                $staleElement = false;
            } catch (StaleElementReferenceException $exception) {
                $staleElement = true;
            }
        }

        foreach ($postLinks as $postLink) {
            $I->waitForElement('article.post a');
            $I->click($postLink);
            $I->waitForElement('#post-add-comment');
            $I->moveBack();
        }

        return $I;
    }
}

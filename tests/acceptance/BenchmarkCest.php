<?php


class BenchmarkCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function benchmark(AcceptanceTester $I)
    {
        $paths = [
            '/en/blog/',
            '/en/blog/posts/pellentesque-vitae-velit-ex',
        ];

        $selectors = [];

        foreach ($paths as $path) {
            $selectors[] = 'a[href="' . $path . '"]';
        }

        for ($i = 0; $i < 100; $i++) {
            $I->amOnPage('/');

            foreach ($selectors as $selector) {
                $I->waitForElement($selector);
                $I->click($selector);
            }
        }
    }
}

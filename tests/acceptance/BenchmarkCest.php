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
//        $I->amOnPage('/');

        for ($i = 0; $i < 10; $i++) {
            $I->amOnPage('/');
//            $I->wait(1);
//            $I->waitForElementVisible('a[href="/en/blog/"]');
            $I->waitForElement('a[href="/en/blog/"]');
//            $I->click('Browse application');
            $I->click('a[href="/en/blog/"]');


//            $I->wait(1);
//            $I->waitForElementVisible('a[href="/en/blog/posts/pellentesque-vitae-velit-ex"]');
            $I->waitForElement('a[href="/en/blog/posts/pellentesque-vitae-velit-ex"]');
//            $I->click('Pellentesque vitae velit ex');
            $I->click('a[href="/en/blog/posts/pellentesque-vitae-velit-ex"]');


//            $I->wait(1);
//            $I->waitForElementVisible('a[href="/"]');
            $I->waitForElement('a[href="/"]');
//            $I->click('Symfony Demo');
            $I->click('a[href="/"]');
        }
    }
}

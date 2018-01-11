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
        $I->amOnPage('/');

        for ($i = 0; $i < 10; $i++) {
            $I->click('Browse application');
            $I->click('Pellentesque vitae velit ex');
            $I->click('Symfony Demo');
        }
    }
}

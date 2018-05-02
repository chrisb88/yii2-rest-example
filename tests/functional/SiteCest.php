<?php


class SiteCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function siteIndex(FunctionalTester $I)
    {
        $I->amOnPage(['site/index']);
        $I->see('Congratulations!');
    }

    public function siteError(FunctionalTester $I)
    {
        $I->amOnPage(['site/not-existing']);
        $I->see('Not Found');
        $I->seePageNotFound();
    }
}

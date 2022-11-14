<?php
class HomeFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnPage(['site/home']);
    }

    public function openHomePage(\FunctionalTester $I)
    {
        $I->grabResponse();
        $I->seeResponseContains('Text from controller');
    }
}

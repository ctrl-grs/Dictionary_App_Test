<?php
use app\models\Dictionary;
class DictionaryControllerCest
{
    public function clickCheck(\FunctionalTester $I)
    {
        $I->amOnRoute('site/index');
        $I->see('Go', 'a.btn.btn-info.btn-md');
        $I->click('Go', 'a.btn.btn-info.btn-md');
    }

    public function okForm(\FunctionalTester $I)
    {
        $I->amOnRoute('dictionary/create');
        $I->submitForm('#dictionary-form', [
          'Dictionary[term]' => 'chicken',
          'Dictionary[language]' => 'chino',
          'Dictionary[translation]' => 'wantun',
        ]);
        $I->expectTo('Save');
        $I->see('chicken', 'td');
    }

    public function wrongForm(\FunctionalTester $I)
    {
        $I->amOnRoute('dictionary/create');
        $I->submitForm('#dictionary-form', [
          'Dictionary[term]' => 'chicken',
          'Dictionary[language]' => 'chinese',
          'Dictionary[translation]' => 'wantun',
        ]);
        $I->expectTo('Save');
        $I->see('Language should contain at most 6 characters.', 'div.help-block');
    }

    public function emptyForm(\FunctionalTester $I)
    {
        $I->amOnRoute('dictionary/create');
        $I->submitForm('#dictionary-form', []);
        $I->expectTo('see validations errors');
        $I->see('Term cannot be blank');
        $I->see('Language cannot be blank.');
        $I->see('Translation cannot be blank');
    }
}

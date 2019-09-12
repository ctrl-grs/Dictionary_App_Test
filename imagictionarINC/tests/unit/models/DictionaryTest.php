<?php

namespace tests\unit\models;

use app\models\Dictionary;
class DictionaryTest extends \Codeception\Test\Unit
{
    private $model;
    /**
     * @var \UnitTester
     */
    public $tester;

    public function testTranslate()
    {
        $model = new Dictionary(['term' => 'hola', 'language' => 'en', 'translation' => 'hello']);
        $model->save();
        expect(Dictionary::translate('hola', 'en'))->equals('hello');
        expect(Dictionary::translate('hogfgla', 'language'))->equals('hogfgla');
    }
}

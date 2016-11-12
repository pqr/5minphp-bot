<?php

class InfoCest {

    public function testInfo(\AcceptanceTester $I)
    {
        $I->sendGET('/info');
        $I->seeResponseCodeIs(200);
        $I->seeResponseMatchesJsonType([
            'author' => 'string',
            'info' => 'string',
            'commands' => 'array'
        ]);

        $I->seeResponseContainsJson([
            'author' => 'Пётр Мязин (https://twitter.com/PetrMyazin)',
            'info' => 'Если в чате упоминается PHP, то "Пятиминутка PHP" сообщает какой-то интересный и полезный факт об этом языке программирования! База знаний постоянно пополняется!'
        ]);
    }

}
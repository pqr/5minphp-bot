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
            'author' => 'Пётр Мязин',
            'info' => 'бот "Пятиминутка PHP" расскажет интересный и полезный факт об этом языке программирования, при упоминании PHP. Twitter: 5minphp'
        ]);
    }

}
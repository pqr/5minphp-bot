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
            'author' => '[@5minphp](https://twitter.com/5minphp)',
            'info' => 'бот "Пятиминутка PHP" расскажет интересный и полезный факт об этом языке программирования, при упоминании PHP'
        ]);
    }

}
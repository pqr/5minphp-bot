<?php

class Response201Cest {

    /**
     * @example ["какой-то текст содержащий в конце php"]
     * @example ["php идёт в начале"]
     * @example ["в середине текста php есть"]
     * @example ["какой-то текст содержащий в конце PHP"]
     * @example ["PHP идёт в начале"]
     * @example ["в середине текста PHP есть"]
     * @example ["какой-то текст содержащий в конце пхп"]
     * @example ["пхп идёт в начале"]
     * @example ["в середине текста пхп есть"]
     * @example ["какой-то текст содержащий в конце ПХП"]
     * @example ["ПХП идёт в начале"]
     * @example ["в середине текста ПХП есть"]
     */
    public function wordPhp(\AcceptanceTester $I, \Codeception\Example $example)
    {
        $msg = [
            'text' => $example[0],
            'username' => 'user123',
            'display_name' => 'Джон'
        ];

        $I->sendPOST('/event', json_encode($msg));
        $I->seeResponseCodeIs(201);
        $I->seeResponseMatchesJsonType([
            'text' => 'string',
            'bot' => 'string'
        ]);
    }

    public function downloadNewFacts(\AcceptanceTester $I)
    {
        $msg = [
            'text' => 'Пятиминутка, обновись, пожалуйста',
            'username' => 'pqr',
            'display_name' => 'Пётр'
        ];

        $I->sendPOST('/event', json_encode($msg));
        $I->seeResponseCodeIs(201);
        $I->seeResponseContainsJson(['text' => 'У меня для вас есть свежие факты про PHP. Просто напишите сообщение с текстом содержащим "PHP", и вы узнаете, что...', 'bot' => 'Пятиминутка PHP']);
    }

}


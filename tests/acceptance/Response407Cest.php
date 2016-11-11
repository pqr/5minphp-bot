<?php

class Response407Cest {

    public function emptyRequest(\AcceptanceTester $I)
    {
        $I->sendPOST('/event', "");
        $I->seeResponseCodeIs(407);
    }

    public function notValidJson(\AcceptanceTester $I)
    {
        $I->sendPOST('/event', "not valid json}");
        $I->seeResponseCodeIs(407);
    }

    public function noWordPhp(\AcceptanceTester $I)
    {
        $msg = [
            'text' => 'какой-то текст не содержащий elephpant',
            'username' => 'user123',
            'display_name' => 'Джон'
        ];

        $I->sendPOST('/event', json_encode($msg));
        $I->seeResponseCodeIs(407);
    }

}


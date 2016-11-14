<?php

class Response417Cest {

    public function emptyRequest(\AcceptanceTester $I)
    {
        $I->sendPOST('/event', "");
        $I->seeResponseCodeIs(417);
    }

    public function notValidJson(\AcceptanceTester $I)
    {
        $I->sendPOST('/event', "not valid json}");
        $I->seeResponseCodeIs(417);
    }

    public function noWordPhp(\AcceptanceTester $I)
    {
        $msg = [
            'text' => 'какой-то текст не содержащий elephpant',
            'username' => 'user123',
            'display_name' => 'Джон'
        ];

        $I->sendPOST('/event', json_encode($msg));
        $I->seeResponseCodeIs(417);
    }

}


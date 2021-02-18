<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\response\MultiselectResponse;

/**
 * @requires PHP 5.6.28
 */
class EntityMultiselectResponse_MalformedSelectionsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since non-arrays are automatically converted to arrays');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new MultiselectResponse('https://example.edu/surveys/100/questionnaires/30/items/5/users/554433/responses/5'))
            ->setSelections('This is not a list')
            ->setStartedAtTime(new \DateTime('2018-08-01T05:55:48.000Z'))
            ->setEndedAtTime(new \DateTime('2018-08-01T06:00:00.000Z'))
            ->setDuration('PT4M12S')
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

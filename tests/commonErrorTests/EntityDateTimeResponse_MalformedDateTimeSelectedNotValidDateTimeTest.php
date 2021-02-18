<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\response\DateTimeResponse;

/**
 * @requires PHP 5.6.28
 */
class EntityDateTimeResponse_MalformedDateTimeSelectedNotValidDateTimeTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since errors are not thrown for dates missing time component');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new DateTimeResponse('https://example.edu/surveys/100/questionnaires/30/items/4/users/554433/responses/4'))
            ->setDateTimeSelected(new \DateTime('2018-12-15'))
            ->setStartedAtTime(new \DateTime('2018-08-01T05:55:48.000Z'))
            ->setEndedAtTime(new \DateTime('2018-08-01T06:00:00.000Z'))
            ->setDuration('PT4M12S')
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

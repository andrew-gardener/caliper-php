<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\session\Session;

/**
 * @requires PHP 5.6.28
 */
class EntitySession_MalformedEndedAtTimeNotValidDateTimeTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since errors are not thrown for dates missing time component');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
            ->setUser(
                (new Person('https://example.edu/users/554433'))
            )
            ->setStartedAtTime(new \DateTime('2016-09-15T10:00:00.000Z'))
            ->setEndedAtTime(new \DateTime('2016-09-15'));
    }
}
<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\session\Session;

/**
 * @requires PHP 5.6.28
 */
class EntitySession_MalformedClientWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\session\Session::setClient: SoftwareApplication expected');

        (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
            ->setUser(
                (new Person('https://example.edu/users/554433'))
            )
            ->setClient(
                (new Person('https://example.edu/users/554433'))
            )
            ->setStartedAtTime(new \DateTime('2016-09-15T10:00:00.000Z'));
    }
}
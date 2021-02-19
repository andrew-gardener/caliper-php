<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\session\LtiSession;
use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class EntityLtiSession_MalformedMessageParametersNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\session\LtiSession::setMessageParameters: associative array expected');

        (new LtiSession('https://example.edu/lti/sessions/b533eb02823f31024e6b7f53436c42fb99b31241'))
            ->setUser(
                (new Person('https://example.edu/users/554433'))
            )
            ->setMessageParameters(['https://example.edu', 'https://example.edu/users/554433'])
            ->setDateCreated(new \DateTime('2018-11-15T10:15:00.000Z'))
            ->setStartedAtTime(new \DateTime('2018-11-15T10:15:00.000Z'));
    }
}

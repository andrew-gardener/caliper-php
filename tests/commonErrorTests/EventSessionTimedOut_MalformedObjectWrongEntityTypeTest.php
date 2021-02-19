<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\profiles\Profile;
use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\session\Session;
use IMSGlobal\Caliper\events\SessionEvent;

/**
 * @requires PHP 5.6.28
 */
class EventSessionTimedOut_MalformedObjectWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\events\SessionEvent::setObject: Session expected for action TimedOut');

        (new SessionEvent('urn:uuid:4e61cf6c-ffbe-45bc-893f-afe7ad4079dc'))
            ->setActor(
                (new SoftwareApplication('https://example.edu'))
            )
            ->setProfile(
                new Profile(Profile::SESSION))
            ->setAction(
                new Action(Action::TIMED_OUT))
            ->setObject(
                (new Person('https://example.edu/users/112233'))
            )
            ->setEventTime(
                new \DateTime('2016-11-15T11:15:00.000Z'))
            ->setEdApp(
                (new SoftwareApplication('https://example.edu'))->makeReference());
    }
}

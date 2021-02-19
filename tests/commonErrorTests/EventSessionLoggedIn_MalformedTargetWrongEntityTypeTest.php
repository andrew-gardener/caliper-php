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
class EventSessionLoggedIn_MalformedTargetWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\events\SessionEvent::setTarget: DigitalResource expected');

        (new SessionEvent('urn:uuid:fcd495d0-3740-4298-9bec-1154571dc211'))
            ->setActor(
                (new Person('https://example.edu/users/554433'))
            )
            ->setProfile(
                new Profile(Profile::SESSION))
            ->setAction(
                new Action(Action::LOGGED_IN))
            ->setObject(
                (new SoftwareApplication('https://example.edu'))
                    ->setVersion('v2')
            )
            ->setTarget(
                (new Person('https://example.edu/users/554433'))
            )
            ->setEventTime(
                new \DateTime('2016-11-15T10:15:00.000Z'))
            ->setEdApp(
                (new SoftwareApplication('https://example.edu'))->makeReference())
            ->setSession(
                (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
                    ->setUser(
                        (new Person('https://example.edu/users/554433'))->makeReference())
                    ->setDateCreated(
                        new \DateTime('2016-11-15T10:00:00.000Z'))
                    ->setStartedAtTime(
                        new \DateTime('2016-11-15T10:00:00.000Z'))
            );
    }
}

<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\profiles\Profile;
use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\agent\Organization;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\lis\CourseSection;
use IMSGlobal\Caliper\entities\lis\Membership;
use IMSGlobal\Caliper\entities\lis\Role;
use IMSGlobal\Caliper\entities\lis\Status;
use IMSGlobal\Caliper\entities\session\Session;
use IMSGlobal\Caliper\events\AssignableEvent;

/**
 * @requires PHP 5.6.28
 */
class EventAssignable_MalformedObjectWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\events\AssignableEvent::setObject: AssignableDigitalResource expected');

        (new AssignableEvent('urn:uuid:2635b9dd-0061-4059-ac61-2718ab366f75'))
            ->setActor(
                (new Person('https://example.edu/users/112233'))
            )
            ->setProfile(
                new Profile(Profile::ASSIGNABLE))
            ->setAction(
                new Action(Action::ACTIVATED))
            ->setObject(
                (new Person('https://example.edu/users/112233'))
            )
            ->setEventTime(
                new \DateTime('2016-11-12T10:15:00.000Z'))
            ->setEdApp(
                (new SoftwareApplication('https://example.edu'))
                    ->setVersion(
                        'v2'
                    )
            )
            ->setGroup(
                (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    ->setCourseNumber(
                        'CPS 435-01'
                    )
                    ->setAcademicSession(
                        'Fall 2016'
                    )
            )
            ->setMembership(
                (new Membership('https://example.edu/terms/201601/courses/7/sections/1/rosters/1'))
                    ->setMember(
                        (new Person('https://example.edu/users/112233'))->makeReference())
                    ->setOrganization(
                        (new Organization('https://example.edu/terms/201601/courses/7/sections/1'))->makeReference())
                    ->setRoles(
                        [new Role(Role::INSTRUCTOR)])
                    ->setStatus(
                        new Status(Status::ACTIVE))
                    ->setDateCreated(
                        new \DateTime('2016-08-01T06:00:00.000Z'))
            )
            ->setSession(
                (new Session('https://example.edu/sessions/f095bbd391ea4a5dd639724a40b606e98a631823'))
                    ->setStartedAtTime(
                        new \DateTime('2016-11-12T10:00:00.000Z'))
            );
    }
}
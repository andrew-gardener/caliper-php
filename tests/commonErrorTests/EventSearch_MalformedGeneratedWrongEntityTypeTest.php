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
use IMSGlobal\Caliper\events\SearchEvent;
use IMSGlobal\Caliper\entities\search\SearchResponse;

/**
 * @requires PHP 5.6.28
 */
class EventSearch_MalformedGeneratedWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\events\SearchEvent::setGenerated: SearchResponse expected');

        (new SearchEvent('urn:uuid:cb3878ed-8240-4c6d-9fee-77221810f5e4'))
            ->setActor(
                (new Person('https://example.edu/users/554433'))
            )
            ->setProfile(
                new Profile(Profile::SEARCH))
            ->setAction(
                new Action(Action::SEARCHED))
            ->setObject(
                (new SoftwareApplication('https://example.edu/catalog'))
            )
            ->setGenerated(
                (new Person('https://example.edu/users/554433'))
            )
            ->setEventTime(
                new \DateTime('2018-11-15T10:05:00.000Z'))
            ->setEdApp(
                (new SoftwareApplication('https://example.edu'))->makeReference())
            ->setGroup(
                (new CourseSection('https://example.edu/terms/201801/courses/7/sections/1'))
                    ->setCourseNumber(
                        'CPS 435-01'
                    )
                    ->setAcademicSession(
                        'Fall 2018'
                    )
            )
            ->setMembership(
                (new Membership('https://example.edu/terms/201801/courses/7/sections/1/rosters/1'))
                    ->setMember(
                        (new Person('https://example.edu/users/554433'))->makeReference())
                    ->setOrganization(
                        (new Organization('https://example.edu/terms/201801/courses/7/sections/1'))->makeReference())
                    ->setRoles(
                        [new Role(Role::LEARNER)])
                    ->setStatus(
                        new Status(Status::ACTIVE))
                    ->setDateCreated(
                        new \DateTime('2018-08-01T06:00:00.000Z'))
            )
            ->setSession(
                (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
                    ->setStartedAtTime(
                        new \DateTime('2018-11-15T10:00:00.000Z'))
            );
    }
}

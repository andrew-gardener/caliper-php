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
use IMSGlobal\Caliper\entities\reading\Document;
use IMSGlobal\Caliper\events\ViewEvent;

/**
 * @requires PHP 5.6.28
 */
class Event_MalformedSessionWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new ViewEvent('urn:uuid:cd088ca7-c044-405c-bb41-0b2a8506f907'))
            ->setActor(
                (new Person('https://example.edu/users/554433'))
            )
            ->setProfile(
                new Profile(Profile::READING))
            ->setAction(
                new Action(Action::VIEWED))
            ->setObject(
                (new Document('https://example.edu/etexts/201.epub'))
                    ->setName(
                        'IMS Caliper Implementation Guide'
                    )
                    ->setDateCreated(
                        new \DateTime('2016-08-01T06:00:00.000Z'))
                    ->setDatePublished(
                        new \DateTime('2016-10-01T06:00:00.000Z'))
                    ->setVersion(
                        '1.1'
                    )
            )
            ->setEventTime(
                new \DateTime('2016-11-15T10:15:00.000Z'))
            ->setEdApp(
                (new SoftwareApplication('https://example.edu'))->makeReference())
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
                        (new Person('https://example.edu/users/554433'))->makeReference())
                    ->setOrganization(
                        (new Organization('https://example.edu/terms/201601/courses/7/sections/1'))->makeReference())
                    ->setRoles(
                        [new Role(Role::LEARNER)])
                    ->setStatus(
                        new Status(Status::ACTIVE))
                    ->setDateCreated(
                        new \DateTime('2016-08-01T06:00:00.000Z'))
            )
            ->setSession(
                (new Person('https://example.edu/users/554433'))
            );
    }
}

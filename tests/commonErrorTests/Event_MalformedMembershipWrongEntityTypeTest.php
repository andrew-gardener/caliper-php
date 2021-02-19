<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\profiles\Profile;
use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\lis\CourseSection;
use IMSGlobal\Caliper\entities\reading\Document;
use IMSGlobal\Caliper\entities\session\Session;
use IMSGlobal\Caliper\events\ViewEvent;

/**
 * @requires PHP 5.6.28
 */
class Event_MalformedMembershipWrongEntityTypeTest extends CaliperErrorTestCase {
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
                (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    ->setCourseNumber(
                        'CPS 435-01'
                    )
                    ->setAcademicSession(
                        'Fall 2016'
                    )
            )
            ->setSession(
                (new Session('https://example.edu/sessions/1f6442a482de72ea6ad134943812bff564a76259'))
                    ->setStartedAtTime(new \DateTime('2016-11-15T10:00:00.000Z'))
            );
    }
}

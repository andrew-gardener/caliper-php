<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Organization;
use IMSGlobal\Caliper\entities\DigitalResourceCollection;
use IMSGlobal\Caliper\entities\lis\CourseSection;

/**
 * @requires PHP 5.6.28
 */
class EntityOrganization_MalformedMembersContainsWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\agent\Organization::setMembers: array of Agent expected');

        (new Organization('https://example.edu/colleges/1/depts/1'))
            ->setName('Computer Science Department')
            ->setSubOrganizationOf(
                (new Organization('https://example.edu/colleges/1'))
                    ->setName('College of Engineering')
            )
            ->setMembers(
                (new DigitalResourceCollection('https://example.edu/terms/201601/courses/7/sections/1/resources/1'))
                    ->setName('Course Assets')
                    ->setIsPartOf(
                        (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    )
            );
    }
}

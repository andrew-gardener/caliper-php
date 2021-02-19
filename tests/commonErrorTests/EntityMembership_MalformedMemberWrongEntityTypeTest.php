<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\lis\CourseOffering;
use IMSGlobal\Caliper\entities\lis\CourseSection;
use IMSGlobal\Caliper\entities\lis\Membership;
use IMSGlobal\Caliper\entities\lis\Role;
use IMSGlobal\Caliper\entities\lis\Status;
use IMSGlobal\Caliper\entities\DigitalResourceCollection;

/**
 * @requires PHP 5.6.28
 */
class EntityMembership_MalformedMemberWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new Membership('https://example.edu/terms/201601/courses/7/sections/1/rosters/1/members/554433'))
            ->setMember(
                (new DigitalResourceCollection('https://example.edu/terms/201601/courses/7/sections/1/resources/1'))
                    ->setName('Course Assets')
                    ->setIsPartOf(
                        (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    )
            )
            ->setOrganization(
                (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    ->setSubOrganizationOf(
                        (new CourseOffering('https://example.edu/terms/201601/courses/7'))
                    )
            )
            ->setRoles([new Role(Role::LEARNER)])
            ->setStatus(new Status(Status::ACTIVE))
            ->setDateCreated(new \DateTime('2016-11-01T06:00:00.000Z'));
    }
}

<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\SystemIdentifier;
use IMSGlobal\Caliper\entities\SystemIdentifierType;
use IMSGlobal\Caliper\entities\lis\CourseOffering;

/**
 * @requires PHP 5.6.28
 */
class EntityCourseOffering_MalformedAcademicSessionNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\\Caliper\\entities\\lis\\CourseOffering::setAcademicSession: string expected');

        (new CourseOffering('https://example.edu/terms/201601/courses/7'))
            ->setCourseNumber('CPS 435')
            ->setAcademicSession(201609)
            ->setName('CPS 435 Learning Analytics')
            ->setOtherIdentifiers([
                (new SystemIdentifier('example.edu:SI182-F16', new SystemIdentifierType(SystemIdentifierType::LIS_SOURCED_ID))),
            ])
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'))
            ->setDateModified(new \DateTime('2016-09-02T11:30:00.000Z'));
    }
}

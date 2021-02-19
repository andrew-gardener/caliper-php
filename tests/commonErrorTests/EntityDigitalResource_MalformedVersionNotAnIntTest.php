<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\DigitalResourceCollection;
use IMSGlobal\Caliper\entities\lis\CourseSection;

/**
 * @requires PHP 5.6.28
 */
class EntityDigitalResource_MalformedVersionNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\DigitalResource::setVersion: string expected');

        (new DigitalResource('https://example.edu/terms/201601/courses/7/sections/1/resources/1/syllabus.pdf'))
            ->setName('Course Syllabus')
            ->setStorageName('fall-2016-syllabus.pdf')
            ->setMediaType('application/pdf')
            ->setCreators(
                [
                    (new Person('https://example.edu/users/223344'))
                ]
            )
            ->setIsPartOf(
                (new DigitalResourceCollection('https://example.edu/terms/201601/courses/7/sections/1/resources/1'))
                    ->setName('Course Assets')
                    ->setIsPartOf(
                        (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    )
            )
            ->setVersion(1.1)
            ->setDateCreated(new \DateTime('2016-08-02T11:32:00.000Z'));
    }
}
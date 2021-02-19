<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\DigitalResourceCollection;
use IMSGlobal\Caliper\entities\lis\CourseSection;
use IMSGlobal\Caliper\entities\reading\Document;

/**
 * @requires PHP 5.6.28
 */
class EntityDigitalResource_MalformedCreatorsListElementWrongTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\DigitalResource::setCreators: array of Agent expected');

        (new DigitalResource('https://example.edu/terms/201601/courses/7/sections/1/resources/1/syllabus.pdf'))
            ->setName('Course Syllabus')
            ->setStorageName('fall-2016-syllabus.pdf')
            ->setMediaType('application/pdf')
            ->setCreators(
                [
                    (new Document('https://example.edu/etexts/201'))
                        ->setName('IMS Caliper Implementation Guide')
                        ->setVersion('1.1')
                ]
            )
            ->setIsPartOf(
                (new DigitalResourceCollection('https://example.edu/terms/201601/courses/7/sections/1/resources/1'))
                    ->setName('Course Assets')
                    ->setIsPartOf(
                        (new CourseSection('https://example.edu/terms/201601/courses/7/sections/1'))
                    )
            )
            ->setDateCreated(new \DateTime('2016-08-02T11:32:00.000Z'));
    }
}

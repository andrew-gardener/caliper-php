<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\DigitalResource;

/**
 * @requires PHP 5.6.28
 */
class EntityDigitalResource_MalformedIsPartOfNotAStringTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new DigitalResource('https://example.edu/terms/201601/courses/7/sections/1/resources/1/syllabus.pdf'))
            ->setName('Course Syllabus')
            ->setStorageName('fall-2016-syllabus.pdf')
            ->setMediaType('application/pdf')
            ->setCreators(
                [
                    (new Person('https://example.edu/users/223344'))
                ]
            )
            ->setIsPartOf('This is not an object or IRI')
            ->setDateCreated(new \DateTime('2016-08-02T11:32:00.000Z'));
    }
}

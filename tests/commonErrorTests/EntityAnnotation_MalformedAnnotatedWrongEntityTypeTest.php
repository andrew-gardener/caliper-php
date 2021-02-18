<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\annotation\Annotation;

/**
 * @requires PHP 5.6.28
 */
class EntityAnnotation_MalformedAnnotatedWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\annotation\Annotation::setAnnotated: DigitalResource expected');

        (new Annotation('https://example.com/users/554433/texts/imscaliperimplguide/annotations/1'))
            ->setAnnotator((new Person('https://example.edu/users/554433')))
            ->setAnnotated((new Person('https://example.edu/users/554433')))
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'));
    }
}

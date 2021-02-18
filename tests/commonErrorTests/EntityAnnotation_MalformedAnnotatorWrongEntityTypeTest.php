<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\annotation\Annotation;
use IMSGlobal\Caliper\entities\Page;

/**
 * @requires PHP 5.6.28
 */
class EntityAnnotation_MalformedAnnotatorWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\annotation\Annotation::setAnnotator: Agent expected');

        (new Annotation('https://example.com/users/554433/texts/imscaliperimplguide/annotations/1'))
            ->setAnnotator((new Page('https://example.com/#/texts/imscaliperimplguide/cfi/6/10!/4/2/2/2@0:0')))
            ->setAnnotated((new Page('https://example.com/#/texts/imscaliperimplguide/cfi/6/10!/4/2/2/2@0:0')))
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'));
    }
}

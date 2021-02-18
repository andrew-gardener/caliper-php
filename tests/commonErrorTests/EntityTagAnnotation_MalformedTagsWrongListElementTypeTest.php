<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\annotation\TagAnnotation;
use IMSGlobal\Caliper\entities\Page;

/**
 * @requires PHP 5.6.28
 */
class EntityTagAnnotation_MalformedTagsWrongListElementTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\annotation\TagAnnotation::setTags: string expected');

        (new TagAnnotation('https://example.com/users/554433/texts/imscaliperimplguide/tags/3'))
            ->setAnnotator(
                (new Person('https://example.edu/users/554433'))
            )
            ->setAnnotated(
                (new Page('https://example.com/#/texts/imscaliperimplguide/cfi/6/10!/4/2/2/2@0:0'))
            )
            ->setTags(['profile', 'event', 'entity', 1])
            ->setDateCreated(new \DateTime('2016-08-01T09:00:00.000Z'));
    }
}
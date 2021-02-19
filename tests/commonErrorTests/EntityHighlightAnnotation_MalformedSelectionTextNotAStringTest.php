<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\annotation\HighlightAnnotation;
use IMSGlobal\Caliper\entities\annotation\TextPositionSelector;
use IMSGlobal\Caliper\entities\reading\Document;

/**
 * @requires PHP 5.6.28
 */
class EntityHighlightAnnotation_MalformedSelectionTextNotAStringTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\annotation\HighlightAnnotation::setSelectionText: string expected');

        (new HighlightAnnotation('https://example.edu/users/554433/etexts/201/highlights/20'))
            ->setAnnotator(
                (new Person('https://example.edu/users/554433'))
            )
            ->setAnnotated(
                (new Document('https://example.edu/etexts/201'))
            )
            ->setSelection(
                (new TextPositionSelector())
                    ->setStart(2300)
                    ->setEnd(2370)
            )
            ->setSelectionText(
                (new TextPositionSelector())
                    ->setStart(2300)
                    ->setEnd(2370)
            )
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'));
    }
}

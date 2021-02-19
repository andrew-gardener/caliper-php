<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\annotation\HighlightAnnotation;
use IMSGlobal\Caliper\entities\reading\Document;

/**
 * @requires PHP 5.6.28
 */
class EntityHighlightAnnotation_MalformedSelectionWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new HighlightAnnotation('https://example.edu/users/554433/etexts/201/highlights/20'))
            ->setAnnotator(
                (new Person('https://example.edu/users/554433'))
            )
            ->setAnnotated(
                (new Document('https://example.edu/etexts/201'))
            )
            ->setSelection(
                (new Person('https://example.edu/users/554433'))
            )
            ->setSelectionText('ISO 8601 formatted date and time expressed with millisecond precision.')
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'));
    }
}

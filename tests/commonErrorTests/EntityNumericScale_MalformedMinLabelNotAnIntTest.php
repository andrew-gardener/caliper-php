<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\NumericScale;

/**
 * @requires PHP 5.6.28
 */
class EntityNumericScale_MalformedMinLabelNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\scale\NumericScale::setMinLabel: string expected');

        (new NumericScale('https://example.edu/scale/4'))
            ->setMinValue(0.0)
            ->setMinLabel(0)
            ->setMaxValue(10.0)
            ->setMaxLabel('Liked')
            ->setStep(0.5)
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

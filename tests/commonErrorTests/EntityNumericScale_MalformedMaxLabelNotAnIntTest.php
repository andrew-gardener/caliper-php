<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\NumericScale;

/**
 * @requires PHP 5.6.28
 */
class EntityNumericScale_MalformedMaxLabelNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\scale\NumericScale::setMaxLabel: string expected');

        (new NumericScale('https://example.edu/scale/4'))
            ->setMinValue(0.0)
            ->setMinLabel('Disliked')
            ->setMaxValue(10.0)
            ->setMaxLabel(10)
            ->setStep(0.5)
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

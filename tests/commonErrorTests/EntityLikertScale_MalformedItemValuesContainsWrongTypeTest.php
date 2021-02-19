<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\LikertScale;

/**
 * @requires PHP 5.6.28
 */
class EntityLikertScale_MalformedItemValuesContainsWrongTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\scale\LikertScale::setItemValues: array of string expected');

        (new LikertScale('https://example.edu/scale/2'))
            ->setScalePoints(4)
            ->setItemLabels(['Strongly Disagree', 'Disagree', 'Agree', 'Strongly Agree'])
            ->setItemValues(['-2', '-1', '1', '2', 5]);
    }
}

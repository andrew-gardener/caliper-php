<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\LikertScale;

/**
 * @requires PHP 5.6.28
 */
class EntityLikertScale_MalformedItemLabelsContainsWrongTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\scale\LikertScale::setItemLabels: array of string expected');

        (new LikertScale('https://example.edu/scale/2'))
            ->setScalePoints(4)
            ->setItemLabels(['Strongly Disagree', 'Disagree', 'Agree', 5])
            ->setItemValues(['-2', '-1', '1', '2']);
    }
}

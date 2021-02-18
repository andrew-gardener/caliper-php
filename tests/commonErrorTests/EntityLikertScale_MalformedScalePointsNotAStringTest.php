<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\LikertScale;

/**
 * @requires PHP 5.6.28
 */
class EntityLikertScale_MalformedScalePointsNotAStringTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\scale\LikertScale::setScalePoints: integer expected');

        (new LikertScale('https://example.edu/scale/2'))
            ->setScalePoints('Four')
            ->setItemLabels(['Strongly Disagree', 'Disagree', 'Agree', 'Strongly Agree'])
            ->setItemValues(['-2', '-1', '1', '2']);
    }
}

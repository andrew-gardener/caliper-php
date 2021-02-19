<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\scale\LikertScale;

/**
 * @requires PHP 5.6.28
 */
class EntityLikertScale_MalformedItemLabelsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since non-arrays are automatically converted to arrays');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new LikertScale('https://example.edu/scale/2'))
            ->setScalePoints(4)
            ->setItemLabels('This is not a list')
            ->setItemValues(['-2', '-1', '1', '2']);
    }
}

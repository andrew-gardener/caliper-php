<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\measure\AggregateMeasure;

/**
 * @requires PHP 5.6.28
 */
class EntityAggregateMeasure_MalformedMetricNotPresentTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since errors are not thrown for missing metric');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new AggregateMeasure('urn:uuid:c3ba4c01-1f17-46e0-85dd-1e366e6ebb81'))
            ->setName('Units Completed')
            ->setMetricValue(12.0)
            ->setMaxMetricValue(25.0)
            ->setStartedAtTime(new \DateTime('2019-08-15T10:15:00.000Z'))
            ->setEndedAtTime(new \DateTime('2019-11-15T10:15:00.000Z'));
    }
}

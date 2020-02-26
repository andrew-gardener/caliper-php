<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\measure\AggregateMeasure;
use IMSGlobal\Caliper\entities\measure\Metric;

class EnvelopeTermMetricTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $metrics = array(
            new Metric(Metric::ASSESSMENTS_PASSED),
            new Metric(Metric::ASSESSMENTS_SUBMITTED),
            new Metric(Metric::MINUTES_ON_TASK),
            new Metric(Metric::SKILLS_MASTERED),
            new Metric(Metric::STANDARDS_MASTERED),
            new Metric(Metric::UNITS_COMPLETED),
            new Metric(Metric::UNITS_PASSED),
            new Metric(Metric::WORDS_READ),
        );

        $data = array();
        foreach ($metrics as $metric) {
            $data[]= ( AggregateMeasure::makeAnonymous() )
                ->setMetric( $metric )
                ->setMetricValue( 12.0 );
        }

        $this->setTestObject((new \IMSGlobal\Caliper\request\Envelope())
            ->setSensorId(new \IMSGlobal\Caliper\Sensor('https://example.edu/sensors/1'))
            ->setSendTime(new \DateTime('2020-01-22T10:05:00.000Z'))
            ->setData($data)
        );
    }
}

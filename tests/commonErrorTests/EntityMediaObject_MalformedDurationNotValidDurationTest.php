<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\media\MediaObject;

/**
 * @requires PHP 5.6.28
 */
class EntityMediaObject_MalformedDurationNotValidDurationTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since ISO 8601 interval validation is currently not implemented');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new MediaObject('https://example.edu/media/54321'))
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'))
            ->setDateModified(new \DateTime('2016-09-02T11:30:00.000Z'))
            ->setDuration('2016-09-02T11:30:00.000Z');
    }
}

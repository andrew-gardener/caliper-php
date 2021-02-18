<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\media\MediaLocation;

/**
 * @requires PHP 5.6.28
 */
class EntityMediaLocation_MalformedCurrentTimeNotValidDurationTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since ISO 8601 interval validation is currently not implemented');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new MediaLocation('https://example.edu/videos/1225'))
            ->setCurrentTime('2016-08-01T06:00:00.000Z')
            ->setDateCreated(new \DateTime('2016-08-01T06:00:00.000Z'));
    }
}

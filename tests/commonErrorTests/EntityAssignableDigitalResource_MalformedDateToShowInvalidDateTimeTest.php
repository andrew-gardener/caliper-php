<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\assignable\AssignableDigitalResource;

/**
 * @requires PHP 5.6.28
 */
class EntityAssignableDigitalResource_MalformedDateToShowInvalidDateTimeTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since errors are not thrown for dates missing time component');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new AssignableDigitalResource('https://example.edu/terms/201601/courses/7/sections/1/assign/2'))
            ->setName('Week 9 Reflection')
            ->setStorageName('assignment-2.pdf')
            ->setDescription('3-5 page reflection on this week\'s assigned readings.')
            ->setDateCreated(new \DateTime('2016-11-01T06:00:00.000Z'))
            ->setDateToActivate(new \DateTime('2016-11-10T11:59:59.000Z'))
            ->setDateToShow(new \DateTime('2016-11-10'))
            ->setDateToStartOn(new \DateTime('2016-11-10T11:59:59.000Z'))
            ->setDateToSubmit(new \DateTime('2016-11-14T11:59:59.000Z'))
            ->setMaxAttempts(2)
            ->setMaxSubmits(2)
            ->setMaxScore(50.0);
    }
}

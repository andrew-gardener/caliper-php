<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\response\RatingScaleResponse;

/**
 * @requires PHP 5.6.28
 */
class EntityRatingScaleResponse_MalformedSelectionsContainsMismatchedTypesTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\response\RatingScaleResponse::setSelections: array of string expected');

        (new RatingScaleResponse('https://example.edu/surveys/100/questionnaires/30/items/1/users/554433/responses/1'))
            ->setSelections(['Satisfied', 10.0])
            ->setStartedAtTime(new \DateTime('2018-08-01T05:55:48.000Z'))
            ->setEndedAtTime(new \DateTime('2018-08-01T06:00:00.000Z'))
            ->setDuration('PT4M12S')
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

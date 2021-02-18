<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\survey\SurveyInvitation;
use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\survey\Survey;

/**
 * @requires PHP 5.6.28
 */
class EntitySurveyInvitation_MalformedSentCountNotAStringTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\survey\SurveyInvitation::setSentCount: integer expected');

        (new SurveyInvitation('https://example.edu/surveys/100/invitations/users/112233'))
            ->setSentCount('One')
            ->setDateSent(new \DateTime('2018-11-15T10:05:00.000Z'))
            ->setRater(
                (new Person('https://example.edu/users/554433'))
            )
            ->setSurvey(
                (new Survey('https://example.edu/survey/1'))
            )
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}
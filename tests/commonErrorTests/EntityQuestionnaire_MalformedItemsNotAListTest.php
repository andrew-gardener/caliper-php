<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\survey\Questionnaire;
use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;

/**
 * @requires PHP 5.6.28
 */
class EntityQuestionnaire_MalformedItemsNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\survey\Questionnaire::setItems: array of QuestionnaireItem expected');

        (new Questionnaire('https://example.edu/surveys/100/questionnaires/30'))
            ->setItems('This is not a list')
            ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

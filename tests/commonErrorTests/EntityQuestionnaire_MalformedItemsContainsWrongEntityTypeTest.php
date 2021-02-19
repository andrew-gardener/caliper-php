<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\survey\Questionnaire;
use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;
use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class EntityQuestionnaire_MalformedItemsContainsWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\survey\Questionnaire::setItems: array of QuestionnaireItem expected');

            (new Questionnaire('https://example.edu/surveys/100/questionnaires/30'))
                ->setItems([
                    (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/1')),
                    (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/2')),
                    (new Person('https://example.edu/users/554433'))
                ])
                ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'));
    }
}

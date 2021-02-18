<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\agent\Person;
use IMSGlobal\Caliper\entities\survey\Questionnaire;
use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;
use IMSGlobal\Caliper\entities\survey\Survey;

/**
 * @requires PHP 5.6.28
 */
class EntitySurvey_MalformedItemsContainsWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\survey\Survey::setItems: array of Questionnaire expected');

        (new Survey('https://example.edu/collections/1'))
            ->setItems([
                (new Person('https://example.edu/users/554433')),
                (new Questionnaire('https://example.edu/surveys/100/questionnaires/30'))
                    ->setItems([
                        (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/1')),
                        (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/2'))
                    ])
                    ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z')),
                (new Questionnaire('https://example.edu/surveys/100/questionnaires/31'))
                    ->setItems([
                        (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/31/items/1')),
                        (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/31/items/2'))
                    ])
                    ->setDateCreated(new \DateTime('2018-08-01T06:00:00.000Z'))
            ]);
    }
}
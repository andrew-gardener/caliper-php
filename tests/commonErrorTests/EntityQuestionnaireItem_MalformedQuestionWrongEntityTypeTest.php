<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;
use IMSGlobal\Caliper\entities\agent\Person;

/**
 * @requires PHP 5.6.28
 */
class EntityQuestionnaireItem_MalformedQuestionWrongEntityTypeTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(TypeError::class);
        // skipping error message since it includes file path
        // $this->expectExceptionMessage('');

        (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/1'))
            ->setQuestion(
                (new Person('https://example.edu/users/554433'))
            )
            ->setCategories(['teaching effectiveness', 'Course structure'])
            ->setWeight(1.0);
    }
}

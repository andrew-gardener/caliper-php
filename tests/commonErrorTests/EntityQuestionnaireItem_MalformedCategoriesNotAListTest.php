<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;
use IMSGlobal\Caliper\entities\question\RatingScaleQuestion;
use IMSGlobal\Caliper\entities\scale\LikertScale;

/**
 * @requires PHP 5.6.28
 */
class EntityQuestionnaireItem_MalformedCategoriesNotAListTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since non-arrays are automatically converted to arrays');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/1'))
            ->setQuestion(
                (new RatingScaleQuestion('https://example.edu/surveys/100/questionnaires/30/items/1/question'))
                    ->setQuestionPosed('How satisfied are you with our services?')
                    ->setScale(
                        (new LikertScale('https://example.edu/scale/2'))
                            ->setScalePoints(4)
                            ->setItemLabels(['Strongly Disagree', 'Disagree', 'Agree', 'Strongly Agree'])
                            ->setItemValues(['-2', '-1', '1', '2'])
                    )
            )
            ->setCategories('This is not a list')
            ->setWeight(1.0);
    }
}

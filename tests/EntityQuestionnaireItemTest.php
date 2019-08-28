<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\survey\QuestionnaireItem;
use IMSGlobal\Caliper\entities\question\RatingScaleQuestion;
use IMSGlobal\Caliper\entities\scale\LikertScale;
use IMSGlobal\Caliper\context\Context;

/**
 * @requires PHP 5.6.28
 */
class EntityQuestionnaireItemTest extends CaliperTestCase {
    function setUp() {
        parent::setUp();

        $this->setTestObject(
            (new QuestionnaireItem('https://example.edu/surveys/100/questionnaires/30/items/1'))
                ->setQuestion(
                    (new RatingScaleQuestion('https://example.edu/surveys/100/questionnaires/30/items/1/question'))
                        ->setContext(new Context(Context::SURVEY_PROFILE_EXTENSION))
                        ->setQuestionPosed('How satisfied are you with our services?')
                        ->setScale(
                            (new LikertScale('https://example.edu/scale/2'))
                                ->setContext(new Context(Context::SURVEY_PROFILE_EXTENSION))
                                ->setScalePoints(4)
                                ->setItemLabels(['Strongly Disagree', 'Disagree', 'Agree', 'Strongly Agree'])
                                ->setItemValues(['-2', '-1', '1', '2'])
                        )
                )
                ->setCategories(['teaching effectiveness', 'Course structure'])
                ->setWeight(1.0)
        );
    }
}


<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\question\OpenEndedQuestion;


/**
 * @requires PHP 7.3
 */
class EntityOpenEndedQuestionTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();

        $this->setTestObject(
            (new OpenEndedQuestion('https://example.edu/surveys/100/questionnaires/30/items/2/question'))
                ->setQuestionPosed('What would you change about your course?')
        );
    }
}


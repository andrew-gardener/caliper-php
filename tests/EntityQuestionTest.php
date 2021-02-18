<?php
require_once 'CaliperTestCase.php';

use IMSGlobal\Caliper\entities\question\Question;


/**
 * @requires PHP 7.3
 */
class EntityQuestionTest extends CaliperTestCase {
    function setUp() : void {
        parent::setUp();

        $this->setTestObject(
            (new Question('https://example.edu/question/1'))
                ->setQuestionPosed('How would you rate this?')
        );
    }
}


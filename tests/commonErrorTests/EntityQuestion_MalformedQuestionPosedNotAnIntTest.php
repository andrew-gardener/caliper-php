<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\question\Question;

/**
 * @requires PHP 5.6.28
 */
class EntityQuestion_MalformedQuestionPosedNotAnIntTest extends CaliperErrorTestCase {
    function testError() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('IMSGlobal\Caliper\entities\question\Question::setQuestionPosed: string expected');

        (new Question('https://example.edu/question/1'))
            ->setQuestionPosed(10);
    }
}

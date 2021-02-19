<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

use IMSGlobal\Caliper\entities\question\DateTimeQuestion;

/**
 * @requires PHP 5.6.28
 */
class EntityDateTimeQuestion_MalformedMaxDateTimeNotValidDateTimeTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since errors are not thrown for dates missing time component');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');

        (new DateTimeQuestion('https://example.edu/surveys/100/questionnaires/30/items/3/question'))
            ->setQuestionPosed('When would you be available for an exam next term?')
            ->setMinDateTime(new \DateTime('2018-09-01T06:00:00.000Z'))
            ->setMinLabel('Start of Term')
            ->setMaxDateTime(new \DateTime('2018-12-30'))
            ->setMaxLabel('End of Term');
    }
}
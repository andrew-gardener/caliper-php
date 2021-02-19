<?php
require_once realpath(dirname(__FILE__) . '/../CaliperErrorTestCase.php');

/**
 * @requires PHP 5.6.28
 */
class Entity_BadJsonTest extends CaliperErrorTestCase {
    function testError() {
        $this->markTestSkipped('Since no JSON->Caliper Object');
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('');
    }
}

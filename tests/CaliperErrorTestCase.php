<?php
require_once 'CaliperBasicTestCase.php';

abstract class CaliperErrorTestCase extends CaliperBasicTestCase {
    function setUp() : void {
        $this->setFixtureRelativeSubDirectoryPath('/commonErrorFixtures');
        parent::setUp();
    }
}

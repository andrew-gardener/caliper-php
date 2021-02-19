<?php
require_once 'CaliperBasicTestCase.php';

abstract class CaliperTestCase extends CaliperBasicTestCase {
    function testObjectSerializesToJson() {
        $testOptions = new IMSGlobal\Caliper\Options();
        $testRequestor = new IMSGlobal\Caliper\request\HttpRequestor($testOptions);
        $testJson = $testRequestor->serializeData($this->getTestObject());

        $fixtureFilePath = $this->getFixtureFilePath();
        try {
            $fixtureJson = file_get_contents($fixtureFilePath);
        } catch (Exception $ex) {
            throw new PHPUnit_Runner_Exception("Error getting contents of '$fixtureFilePath'");
        }

        $exception = false;
        try {
            self::assertJsonStringEqualsJsonString(
                $fixtureJson, $testJson, 'Failed: ' . $this->getCalledClass());
        } catch (Exception $exception) {
            throw $exception;
        } finally {
            $outputDirectoryPath = $this->getOutputDirectoryPath();
            if (($outputDirectoryPath !== false) && ($exception || $this->isOutputOnlyFailures())) {
                CaliperTestUtilities::saveFormattedFixtureAndTestJson(
                    $fixtureJson, $testJson, $this->getCalledClass(), $outputDirectoryPath);
            }
        }
    }
}

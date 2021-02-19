<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\measure\AggregateMeasureCollection;

class ToolUseEvent extends Event {
    /** @var SoftwareApplication */
    private $object;
    /** @var SoftwareApplication */
    private $target;
    /** @var AggregateMeasureCollection */
    private $generated;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::TOOL_USE));
    }

    /** @return SoftwareApplication object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param SoftwareApplication $object
     * @throws \InvalidArgumentException SoftwareApplication expected
     * @return $this|ToolUseEvent
     */
    public function setObject($object) {
        if ($object instanceof SoftwareApplication) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': SoftwareApplication expected');
    }

    /** @return SoftwareApplication target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param SoftwareApplication $target
     * @return $this|ToolUseEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof SoftwareApplication)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': SoftwareApplication expected');
    }

    /** @return AggregateMeasureCollection|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param AggregateMeasureCollection|null $generated
     * @return $this|ToolUseEvent
     */
    public function setGenerated($generated) {
        if (is_null($generated) || ($generated instanceof AggregateMeasureCollection)) {
            $this->generated = $generated;
            return $this;

        }
        throw new \InvalidArgumentException(__METHOD__ . ': AggregateMeasureCollection expected');
    }
}

<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\assessment\Assessment;
use IMSGlobal\Caliper\entities\assignable\Attempt;

class AssessmentEvent extends Event {
    /** @var Assessment */
    private $object;
    /** @var Attempt|null */
    private $generated;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::ASSESSMENT));
    }

    /** @return Assessment object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param Assessment $object
     * @throws \InvalidArgumentException Assessment expected
     * @return $this|AssessmentEvent
     */
    public function setObject($object) {
        if ($object instanceof Assessment) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Assessment expected');
    }

    /** @return Annotation|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param Attempt|null $generated
     * @return $this|AssessmentEvent
     */
    public function setGenerated($generated) {
        if (is_null($generated) || ($generated instanceof Attempt)) {
            $this->generated = $generated;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Attempt expected');
    }
}

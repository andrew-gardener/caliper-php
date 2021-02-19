<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\entities\assignable\AssignableDigitalResource;
use IMSGlobal\Caliper\entities\assignable\Attempt;
use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\reading\Frame;

class AssignableEvent extends Event {
    /** @var AssignableDigitalResource */
    private $object;
    /** @var Entity|Attempt|null */
    private $generated;
    /** @var Frame */
    private $target;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::ASSIGNABLE));
    }

    /** @return AssignableDigitalResource object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param AssignableDigitalResource $object
     * @throws \InvalidArgumentException AssignableDigitalResource expected
     * @return $this|AssignableEvent
     */
    public function setObject($object) {
        if ($object instanceof AssignableDigitalResource) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': AssignableDigitalResource expected');
    }

    /** @return Entity|Attempt|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param Entity|Attempt|null $generated
     * @return $this|AssessmentItemEvent
     */
    public function setGenerated($generated) {
        $action = $this->getAction();
        $attempt_actions = [
            Action::COMPLETED,
            Action::STARTED,
            Action::REVIEWED,
        ];

        if (in_array($action, $attempt_actions)) {
            if ($generated instanceof Attempt) {
                $this->generated = $generated;
                return $this;
            }
            throw new \InvalidArgumentException(__METHOD__ . ': Attempt expected');
        }

        if (is_null($generated) || ($generated instanceof Entity)) {
            $this->generated = $generated;
            return $this;

        }
        throw new \InvalidArgumentException(__METHOD__ . ': Entity expected');
    }

    /** @return Frame|null target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param Frame|null $target
     * @return $this|AssessmentItemEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof Frame)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': Frame expected');
    }
}

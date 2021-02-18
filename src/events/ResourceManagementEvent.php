<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\DigitalResource;

class ResourceManagementEvent extends Event {
    /** @var DigitalResource */
    private $object;
    /** @var DigitalResource|null */
    private $generated;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::RESOURCE_MANAGEMENT));
    }

    /** @return Annotation|null generated */
    public function getGenerated() {
        return $this->generated;
    }

    /**
     * @param DigitalResource|null $generated
     * @return $this|ResourceManagementEvent
     */
    public function setGenerated($generated) {
        $action = $this->getAction();

        if ($action == Action::COPIED) {
            if ($generated instanceof DigitalResource) {
                $this->generated = $generated;
                return $this;
            }
            throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource expected');
        }

        if (is_null($generated) || ($generated instanceof Entity)) {
            $this->generated = $generated;
            return $this;

        }
        throw new \InvalidArgumentException(__METHOD__ . ': Entity expected');
    }

    /** @return DigitalResource object */
    public function getObject() {
        return $this->object;
    }

    /**
     * @param DigitalResource $object
     * @throws \InvalidArgumentException DigitalResource expected
     * @return $this|ResourceManagementEvent
     */
    public function setObject($object) {
        if ($object instanceof DigitalResource) {
            $this->object = $object;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource expected');
    }
}

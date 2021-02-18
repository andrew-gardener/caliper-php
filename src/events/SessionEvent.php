<?php

namespace IMSGlobal\Caliper\events;

use IMSGlobal\Caliper\actions\Action;
use IMSGlobal\Caliper\entities\DigitalResource;
use IMSGlobal\Caliper\entities\agent\SoftwareApplication;
use IMSGlobal\Caliper\entities\session\Session;

class SessionEvent extends Event {
    /** @var SoftwareApplication|Session */
    private $object;
    /** @var DigitalResource|SoftwareApplication */
    private $referrer;
    /** @var DigitalResource */
    private $target;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->setType(new EventType(EventType::SESSION));
    }

    /** @return SoftwareApplication|Session object */
    public function getObject() {
        return $this->object;
    }

    /**
     * Caliper specifications for _`SessionEvent`_ state the _`object`_ property's
     * type depends on the value of the objects' _`action`_ property:
     *
     * <pre>
     * Action -> Object type
     * `Action::LOGGED_IN` -> `SoftwareApplication`
     * `Action::LOGGED_OUT` -> `SoftwareApplication`
     * `Action::TIMED_OUT` -> `Session`
     * </pre>
     *
     * @param SoftwareApplication|Session $object
     * @throws \InvalidArgumentException SoftwareApplication expected
     * @throws \InvalidArgumentException Session expected
     * @throws \InvalidArgumentException Action must be set before Object
     * @return $this|SessionEvent
     */
    public function setObject($object) {
        $action = $this->getAction();

        if (is_null($action)) {
            throw new \InvalidArgumentException(__METHOD__ . ': Action must be set before Object');
        } elseif ($action == Action::TIMED_OUT) {
            if ($object instanceof Session) {
                $this->object = $object;
            } else {
                throw new \InvalidArgumentException(__METHOD__ .
                    ': Session expected for action ' . $action);
            }
        } elseif ($object instanceof SoftwareApplication) {
            $this->object = $object;
        } else {
            throw new \InvalidArgumentException(__METHOD__ .
                ': SoftwareApplication expected for action ' . $action);
        }

        return $this;
    }

    /** @return DigitalResource|SoftwareApplication */
    public function getReferrer() {
        return $this->referrer;
    }

    /**
     * @param DigitalResource|SoftwareApplication $referrer
     * @return $this|SessionEvent
     */
    public function setReferrer($referrer) {
        if (is_null($referrer) || $referrer instanceof DigitalResource || $referrer instanceof SoftwareApplication) {
            $this->referrer = $referrer;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource or SoftwareApplication expected');
    }

    /** @return DigitalResource|null target */
    public function getTarget() {
        return $this->target;
    }

    /**
     * @param DigitalResource|null $target
     * @return $this|SessionEvent
     */
    public function setTarget($target) {
        if (is_null($target) || ($target instanceof DigitalResource)) {
            $this->target = $target;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': DigitalResource expected');
    }
}

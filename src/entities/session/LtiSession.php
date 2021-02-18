<?php

namespace IMSGlobal\Caliper\entities\session;

use IMSGlobal\Caliper\entities;

class LtiSession extends Session {
    /** @var array */
    private $messageParameters = null;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::LTI_SESSION));
    }

    public function jsonSerialize() {
        $serializedParent = parent::jsonSerialize();
        if (!is_array($serializedParent)) return $serializedParent;
        return $this->removeChildEntitySameContexts(array_merge($serializedParent, [
            'messageParameters' => $this->getMessageParameters(),
        ]));
    }

    /** @return array  */
    public function getMessageParameters() {
        return $this->messageParameters;
    }

    /**
     * @param array $messageParameters
     * @return LtiSession
     */
    public function setMessageParameters($messageParameters) {
        if (!is_null($messageParameters)) {
            if (!is_array($messageParameters)) {
                throw new \InvalidArgumentException(__METHOD__ . ': associative array expected');
            }

            foreach (array_keys($messageParameters) as $key) {
                if (!is_string($key)) {
                    throw new \InvalidArgumentException(__METHOD__ . ': associative array expected');
                }
            }
        }

        $this->messageParameters = $messageParameters;
        return $this;
    }

}

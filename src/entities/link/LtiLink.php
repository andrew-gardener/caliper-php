<?php

namespace IMSGlobal\Caliper\entities\link;

use IMSGlobal\Caliper\entities;
use IMSGlobal\Caliper\entities\LTIMessageType;

class LtiLink extends entities\DigitalResource implements entities\Referrable, entities\Targetable {
    /** @var LTIMessageType */
    private $messageType;

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::LTI_LINK));
    }

    public function jsonSerialize() {
        $serializedParent = parent::jsonSerialize();
        if (!is_array($serializedParent)) return $serializedParent;
        return $this->removeChildEntitySameContexts(array_merge($serializedParent, [
            'messageType' => $this->getMessageType(),
        ]));
    }

    /** @return LTIMessageType|null messageType */
    public function getMessageType() {
        return $this->messageType;
    }

    /**
     * @param LTIMessageType|null $messageType
     * @return $this|LtiLink
     */
    public function setMessageType($messageType) {
        if (is_null($messageType) || ($messageType instanceof LTIMessageType)) {
            $this->messageType = $messageType;
            return $this;
        }

        throw new \InvalidArgumentException(__METHOD__ . ': LTIMessageType expected');
    }
}

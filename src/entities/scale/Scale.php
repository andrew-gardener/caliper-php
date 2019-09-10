<?php

namespace IMSGlobal\Caliper\entities\scale;

use IMSGlobal\Caliper\entities\Entity;
use IMSGlobal\Caliper\entities;
use IMSGlobal\Caliper\context\Context;

class Scale extends Entity implements entities\Referrable {
    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::SCALE));
        $this->setContext(new Context(Context::FEEDBACK_PROFILE_EXTENSION));
    }

    public function jsonSerialize() {
        $serializedParent = parent::jsonSerialize();
        if (!is_array($serializedParent)) return $serializedParent;
        return $this->removeChildEntitySameContexts(array_merge($serializedParent, [
        ]));
    }
}

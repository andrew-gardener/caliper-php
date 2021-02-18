<?php
namespace IMSGlobal\Caliper\entities\agent;

use IMSGlobal\Caliper\entities;

class Agent extends entities\Entity {
    public function __construct($id) {
        parent::__construct($id);
        $this->setType(new entities\EntityType(entities\EntityType::AGENT));
    }
}

<?php
require_once 'CaliperSensor.php';
require_once 'Caliper/entities/Entity.php';
require_once 'Caliper/entities/EntityType.php';
require_once 'Caliper/entities/foaf/Agent.php';
require_once 'Caliper/entities/schemadotorg/SoftwareApplication.php';

class SoftwareApplication extends Entity implements foaf\Agent, schemadotorg\SoftwareApplication {
    private $roles = [];

    public function __construct($id) {
        parent::__construct($id);
        $this->setType(EntityType::SOFTWARE_APPLICATION);
    }

    public function jsonSerialize() {
        return array_merge(parent::jsonSerialize(), [
            'roles' => $this->getRoles(),
        ]);
    }

    public function  getRoles() {
        return $this->roles;
    }

    public function  setRoles($roles) {
        $this->roles = $roles;
        return $this;
    }
}
<?php
namespace IMSGlobal\Caliper\entities;

use IMSGlobal\Caliper;

class LTIMessageType extends Caliper\util\BasicEnum {
    const
        __default = '',
        LTI_DEEP_LINKING_REQUEST = 'LtiDeepLinkingRequest',
        LTI_RESOURCE_LINK_REQUEST = 'LtiResourceLinkRequest';
}

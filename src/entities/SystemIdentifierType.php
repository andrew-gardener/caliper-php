<?php
namespace IMSGlobal\Caliper\entities;

use IMSGlobal\Caliper;

class SystemIdentifierType extends Caliper\util\BasicEnum {
    const
        __default = '',
        ACCOUNT_USERNAME = 'AccountUserName',
        CASE_ITEM_URI = 'CaseItemUri',
        EMAIL_ADDRESS = 'EmailAddress',
        LIS_SOURCED_ID = 'LisSourcedId',
        LTI_CONTEXT_ID = 'LtiContextId',
        LTI_DEPLOYMENT_ID = 'LtiDeploymentId',
        LTI_PLATFORM_ID = 'LtiPlatformId',
        LTI_TOOL_ID = 'LtiToolId',
        LTI_USERID = 'LtiUserId',
        ONEROSTER_SOURCED_ID = 'OneRosterSourcedId',
        OTHER = 'Other',
        SIS_SOURCEDID = 'SisSourcedId',
        SYSTEM_ID = 'SystemId';
}

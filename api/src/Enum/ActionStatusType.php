<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * The status of an Action.
 *
 * @see http://schema.org/ActionStatusType Documentation on Schema.org
 */
class ActionStatusType extends Enum
{
    /**
     * @var string a description of an action that is supported
     */
    public const POTENTIAL_ACTION_STATUS = 'http://schema.org/PotentialActionStatus';

    /**
     * @var string An in-progress action (e.g, while watching the movie, or driving to a location).
     */
    public const ACTIVE_ACTION_STATUS = 'http://schema.org/ActiveActionStatus';

    /**
     * @var string an action that has already taken place
     */
    public const COMPLETED_ACTION_STATUS = 'http://schema.org/CompletedActionStatus';

    /**
     * @var string An action that failed to complete. The action's error property and the HTTP return code contain more information about the failure.
     */
    public const FAILED_ACTION_STATUS = 'http://schema.org/FailedActionStatus';
}

<?php

namespace System\Models;

use Winter\Storm\Database\Models\Revision as RevisionBase;

/**
 * Revision history model
 *
 * @author Alexey Bobkov, Samuel Georges
 */
class Revision extends RevisionBase
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'system_revisions';
}

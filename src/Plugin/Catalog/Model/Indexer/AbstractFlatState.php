<?php

declare(strict_types=1);

/**
 * @author      Andreas Knollmann
 * @copyright   Copyright (c) 2014-2026 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer;

use Magento\Catalog\Model\Indexer\AbstractFlatState as FlatState;

/**
 * Turns off the use of the flat tables of an index while it is disabled, regardless of the configuration.
 */
abstract class AbstractFlatState
{
    /** @var bool Whether the flat tables are disabled */
    private bool $forceDisabled = false;

    /**
     * Returns false while the flat tables are disabled, otherwise the configured state.
     *
     * @param FlatState $subject
     * @param bool $result
     *
     * @return bool
     * @noinspection PhpUnusedParameterInspection
     */
    public function afterIsFlatEnabled(FlatState $subject, bool $result): bool
    {
        return $result && ! $this->forceDisabled;
    }

    /**
     * Disables the flat tables, or enables them again with false.
     *
     * @param bool $forceDisabled
     *
     * @return void
     */
    public function setForceDisabled(bool $forceDisabled = true): void
    {
        $this->forceDisabled = $forceDisabled;
    }

    /**
     * Returns whether the flat tables are disabled.
     *
     * @return bool
     */
    public function isForceDisabled(): bool
    {
        return $this->forceDisabled;
    }
}

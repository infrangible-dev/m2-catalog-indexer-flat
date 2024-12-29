<?php

declare(strict_types=1);

namespace Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Category\Flat;

/**
 * @author      Andreas Knollmann
 * @copyright   2014-2024 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */
class State
{
    /** @var bool */
    private $forceDisabled = false;

    /** @noinspection PhpUnusedParameterInspection */
    public function aroundIsFlatEnabled(
        \Magento\Catalog\Model\Indexer\Category\Flat\State $subject,
        callable $proceed
    ): bool {
        return ! $this->forceDisabled && $proceed();
    }

    public function setForceDisabled(bool $forceDisabled = true)
    {
        $this->forceDisabled = $forceDisabled;
    }
}

<?php

declare(strict_types=1);

namespace Infrangible\CatalogIndexerFlat\Helper;

use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Category\Flat\State;

/**
 * @author      Andreas Knollmann
 * @copyright   2014-2024 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */
class Data
{
    /** @var State */
    protected $categoryFlatStatePlugin;

    /** @var \Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Product\Flat\State */
    protected $productFlatStatePlugin;

    public function __construct(
        State $categoryFlatStatePlugin,
        \Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Product\Flat\State $productFlatStatePlugin
    ) {
        $this->categoryFlatStatePlugin = $categoryFlatStatePlugin;
        $this->productFlatStatePlugin = $productFlatStatePlugin;
    }

    public function disableCategoryFlatIndexer(): void
    {
        $this->categoryFlatStatePlugin->setForceDisabled();
    }

    public function removeDisableCategoryFlatIndexer(): void
    {
        $this->categoryFlatStatePlugin->setForceDisabled(false);
    }

    public function disableProductFlatIndexer(): void
    {
        $this->productFlatStatePlugin->setForceDisabled();
    }

    public function removeDisableProductFlatIndexer(): void
    {
        $this->productFlatStatePlugin->setForceDisabled(false);
    }
}

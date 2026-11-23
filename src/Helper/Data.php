<?php

declare(strict_types=1);

/**
 * @author      Andreas Knollmann
 * @copyright   Copyright (c) 2014-2026 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Infrangible\CatalogIndexerFlat\Helper;

use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Category\Flat\State as CategoryFlatState;
use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Product\Flat\State as ProductFlatState;

/**
 * Disables and enables the use of the flat tables of categories and products, for example during an export that needs
 * attributes which are not part of the flat tables.
 */
class Data
{
    /**
     * @param CategoryFlatState $categoryFlatStatePlugin
     * @param ProductFlatState $productFlatStatePlugin
     */
    public function __construct(
        protected CategoryFlatState $categoryFlatStatePlugin,
        protected ProductFlatState $productFlatStatePlugin
    ) {
    }

    /**
     * Disables the flat tables of categories.
     *
     * @return void
     */
    public function disableCategoryFlatIndexer(): void
    {
        $this->categoryFlatStatePlugin->setForceDisabled();
    }

    /**
     * Enables the flat tables of categories again.
     *
     * @return void
     */
    public function removeDisableCategoryFlatIndexer(): void
    {
        $this->categoryFlatStatePlugin->setForceDisabled(false);
    }

    /**
     * Returns whether the flat tables of categories are disabled.
     *
     * @return bool
     */
    public function isCategoryFlatIndexerDisabled(): bool
    {
        return $this->categoryFlatStatePlugin->isForceDisabled();
    }

    /**
     * Disables the flat tables of products.
     *
     * @return void
     */
    public function disableProductFlatIndexer(): void
    {
        $this->productFlatStatePlugin->setForceDisabled();
    }

    /**
     * Enables the flat tables of products again.
     *
     * @return void
     */
    public function removeDisableProductFlatIndexer(): void
    {
        $this->productFlatStatePlugin->setForceDisabled(false);
    }

    /**
     * Returns whether the flat tables of products are disabled.
     *
     * @return bool
     */
    public function isProductFlatIndexerDisabled(): bool
    {
        return $this->productFlatStatePlugin->isForceDisabled();
    }
}

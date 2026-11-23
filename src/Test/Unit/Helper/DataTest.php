<?php

declare(strict_types=1);

/**
 * @author      Andreas Knollmann
 * @copyright   Copyright (c) 2014-2026 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Infrangible\CatalogIndexerFlat\Test\Unit\Helper;

use Infrangible\CatalogIndexerFlat\Helper\Data;
use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Category\Flat\State as CategoryFlatStatePlugin;
use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Product\Flat\State as ProductFlatStatePlugin;
use PHPUnit\Framework\TestCase;

/**
 * Tests that the helper disables and enables the flat tables of categories and products independently.
 */
class DataTest extends TestCase
{
    /**
     * Tests the flat tables of categories.
     *
     * @return void
     */
    public function testCategoryFlatIndexer(): void
    {
        $categoryPlugin = new CategoryFlatStatePlugin();
        $productPlugin = new ProductFlatStatePlugin();
        $helper = new Data($categoryPlugin, $productPlugin);

        $helper->disableCategoryFlatIndexer();

        $this->assertTrue($helper->isCategoryFlatIndexerDisabled());
        $this->assertTrue($categoryPlugin->isForceDisabled());
        $this->assertFalse($helper->isProductFlatIndexerDisabled());

        $helper->removeDisableCategoryFlatIndexer();

        $this->assertFalse($helper->isCategoryFlatIndexerDisabled());
    }

    /**
     * Tests the flat tables of products.
     *
     * @return void
     */
    public function testProductFlatIndexer(): void
    {
        $categoryPlugin = new CategoryFlatStatePlugin();
        $productPlugin = new ProductFlatStatePlugin();
        $helper = new Data($categoryPlugin, $productPlugin);

        $helper->disableProductFlatIndexer();

        $this->assertTrue($helper->isProductFlatIndexerDisabled());
        $this->assertTrue($productPlugin->isForceDisabled());
        $this->assertFalse($helper->isCategoryFlatIndexerDisabled());

        $helper->removeDisableProductFlatIndexer();

        $this->assertFalse($helper->isProductFlatIndexerDisabled());
    }
}

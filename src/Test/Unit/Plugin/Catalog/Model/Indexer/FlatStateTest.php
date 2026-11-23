<?php

declare(strict_types=1);

/**
 * @author      Andreas Knollmann
 * @copyright   Copyright (c) 2014-2026 Softwareentwicklung Andreas Knollmann
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 */

namespace Infrangible\CatalogIndexerFlat\Test\Unit\Plugin\Catalog\Model\Indexer;

use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Category\Flat\State as CategoryFlatStatePlugin;
use Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\Product\Flat\State as ProductFlatStatePlugin;
use Magento\Catalog\Model\Indexer\Category\Flat\State as CategoryFlatState;
use Magento\Catalog\Model\Indexer\Product\Flat\State as ProductFlatState;
use PHPUnit\Framework\TestCase;

/**
 * Tests the plugins on the flat states of categories and products.
 */
class FlatStateTest extends TestCase
{
    /**
     * Tests that the category plugin keeps the configured state until the flat tables are disabled.
     *
     * @return void
     */
    public function testCategoryFlatState(): void
    {
        $plugin = new CategoryFlatStatePlugin();
        $subject = $this->createStub(CategoryFlatState::class);

        $this->assertFalse($plugin->isForceDisabled());
        $this->assertTrue($plugin->afterIsFlatEnabled($subject, true));
        $this->assertFalse($plugin->afterIsFlatEnabled($subject, false));

        $plugin->setForceDisabled();

        $this->assertTrue($plugin->isForceDisabled());
        $this->assertFalse($plugin->afterIsFlatEnabled($subject, true));
        $this->assertFalse($plugin->afterIsFlatEnabled($subject, false));

        $plugin->setForceDisabled(false);

        $this->assertFalse($plugin->isForceDisabled());
        $this->assertTrue($plugin->afterIsFlatEnabled($subject, true));
    }

    /**
     * Tests that the product plugin keeps the configured state until the flat tables are disabled.
     *
     * @return void
     */
    public function testProductFlatState(): void
    {
        $plugin = new ProductFlatStatePlugin();
        $subject = $this->createStub(ProductFlatState::class);

        $this->assertTrue($plugin->afterIsFlatEnabled($subject, true));

        $plugin->setForceDisabled();

        $this->assertFalse($plugin->afterIsFlatEnabled($subject, true));

        $plugin->setForceDisabled(false);

        $this->assertTrue($plugin->afterIsFlatEnabled($subject, true));
    }
}

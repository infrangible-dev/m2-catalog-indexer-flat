# Infrangible Catalog Indexer Flat

Lets other modules switch off the use of Magento's flat catalog tables for the duration of their own process, without
changing the store configuration. The flat tables only contain a selection of attributes, so processes that need
complete product or category data, such as the exports of
[Infrangible Catalog Product Feed](https://www.infrangible.dev/modules/catalog-product-feed), disable them first.

## Usage

```php
use Infrangible\CatalogIndexerFlat\Helper\Data as CatalogIndexerFlatHelper;

public function __construct(private CatalogIndexerFlatHelper $catalogIndexerFlatHelper)
{
}

public function execute(): void
{
    $this->catalogIndexerFlatHelper->disableProductFlatIndexer();

    try {
        // product collections created here read the EAV tables
    } finally {
        $this->catalogIndexerFlatHelper->removeDisableProductFlatIndexer();
    }
}
```

| Method                                                                  | Effect                                              |
|-------------------------------------------------------------------------|-----------------------------------------------------|
| `disableProductFlatIndexer()` / `removeDisableProductFlatIndexer()`     | disables or enables the flat tables of products     |
| `disableCategoryFlatIndexer()` / `removeDisableCategoryFlatIndexer()`   | disables or enables the flat tables of categories   |
| `isProductFlatIndexerDisabled()` / `isCategoryFlatIndexerDisabled()`    | whether the flat tables are disabled by this module |

While the flat tables are disabled, Magento's flat states report them as not enabled in the current PHP process, so
collections created after the call read the EAV tables. Collections created before keep their state. The setting
applies only to the current process: the storefront and other processes continue to use the flat tables if they are
enabled in the configuration.

## Requirements

- Magento Open Source or Adobe Commerce 2.4.6 or newer
- PHP 8.2 or newer

## Installation

```bash
composer require infrangible/m2-catalog-indexer-flat
bin/magento module:enable Infrangible_CatalogIndexerFlat
bin/magento setup:upgrade
```

In production mode, also run `bin/magento setup:di:compile`.

## License

Infrangible Catalog Indexer Flat is licensed under the MIT License - see the LICENSE file for details.

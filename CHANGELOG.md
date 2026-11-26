# Changelog

## 2.0.1

### Changed

- Supports PHP 8.1 again, like Magento 2.4.6: the Adobe Commerce Marketplace requires modules to allow every PHP
  version of the Magento versions they support.

## 2.0.0

### Breaking changes

- Requires Magento 2.4.6 or newer and PHP 8.2 or newer. Older versions of Magento and PHP 7.1 to 8.1 are no longer
  supported; use version 1.x for these.
- Requires `infrangible/m2-foundation` 3.0 and `magento/module-catalog`.
- The plugins on the flat states are after plugins instead of around plugins (`afterIsFlatEnabled()` instead of
  `aroundIsFlatEnabled()`) and share the abstract class
  `Infrangible\CatalogIndexerFlat\Plugin\Catalog\Model\Indexer\AbstractFlatState`.
- All classes have native types, and the helper uses constructor property promotion.

### Added

- `isProductFlatIndexerDisabled()` and `isCategoryFlatIndexerDisabled()` in the helper.
- Unit tests.
- README with the usage.

### Changed

- The module is loaded after the modules it uses.
- Checks with PHPStan level 9, the Magento coding standard and unit tests on every push.

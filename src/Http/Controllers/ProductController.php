<?php

namespace XMShop\Attribute\Http\Controllers;

use Webkul\Product\Repositories\ProductRepository;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Product\Repositories\ProductInventoryRepository;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Product\Repositories\ProductAttributeValueRepository;
use Webkul\Product\Repositories\ProductDownloadableLinkRepository;
use Webkul\Product\Repositories\ProductDownloadableSampleRepository;
use Webkul\Admin\Http\Controllers\Catalog\ProductController as BaseProductController;

class ProductController extends BaseProductController
{
    public function __construct(
        protected ProductRepository $productRepository,
        protected CustomerRepository $customerRepository,
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected ProductInventoryRepository $productInventoryRepository,
        protected ProductAttributeValueRepository $productAttributeValueRepository,
        protected ProductDownloadableLinkRepository $productDownloadableLinkRepository,
        protected ProductDownloadableSampleRepository $productDownloadableSampleRepository
    ) {
        parent::__construct($attributeFamilyRepository, $productAttributeValueRepository, $productDownloadableLinkRepository, $productDownloadableSampleRepository, $productInventoryRepository, $productRepository, $customerRepository);
    }
}
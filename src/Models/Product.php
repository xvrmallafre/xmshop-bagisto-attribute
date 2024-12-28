<?php
namespace XMShop\Attribute\Models;

use Webkul\Product\Models\Product as ProductModel;

class Product extends ProductModel
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = array_merge($this->fillable, [
            'product_files_active',
            'product_files_config'
        ]);
    }

    public function hasCustomAttributes()
    {
        return $this->attribute_family->custom_attributes->contains('code', 'product_files_active') &&
            $this->attribute_family->custom_attributes->contains('code', 'product_files_config');
    }
}
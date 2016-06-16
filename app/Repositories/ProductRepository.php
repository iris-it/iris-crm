<?php

namespace App\Repositories;

use App\Models\Product;
use InfyOm\Generator\Common\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'product_name',
        'is_active',
        'category',
        'ht_price',
        'ttc_price',
        'manutention_officer',
        'stock_disponibility',
        'product_avatar',
        'sale_datestart',
        'sale_dateend',
        'product_notice',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}

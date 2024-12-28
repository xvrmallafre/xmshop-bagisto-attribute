<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    const TABLE_NAME = 'attributes';
    const COLUMN_NAME_ACTIVE = 'product_files_active';
    const COLUMN_NAME_CONFIG = 'product_files_config';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = Carbon::now();

        DB::table(self::TABLE_NAME)->insert([
            [
                'code'              => self::COLUMN_NAME_ACTIVE,
                'admin_name'        => 'Product Files Active',
                'type'              => 'boolean',
                'validation'        => null,
                'is_required'       => 0,
                'is_unique'         => 0,
                'value_per_locale'  => 0,
                'value_per_channel' => 0,
                'default_value'     => 0,
                'is_filterable'     => 0,
                'is_configurable'   => 0,
                'is_user_defined'   => 0,
                'is_visible_on_front' => 0,
                'is_comparable'     => 0,
                'enable_wysiwyg'    => 0,
                'created_at'        => $now,
                'updated_at'        => $now,
            ],
            [
                'code'              => self::COLUMN_NAME_CONFIG,
                'admin_name'        => 'Product Files Config',
                'type'              => 'text',
                'validation'        => null,
                'is_required'       => 0,
                'is_unique'         => 0,
                'value_per_locale'  => 0,
                'value_per_channel' => 0,
                'default_value'     => null,
                'is_filterable'     => 0,
                'is_configurable'   => 0,
                'is_user_defined'   => 0,
                'is_visible_on_front' => 0,
                'is_comparable'     => 0,
                'enable_wysiwyg'    => 0,
                'created_at'        => $now,
                'updated_at'        => $now,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table(self::TABLE_NAME)->whereIn('code', [self::COLUMN_NAME_ACTIVE, self::COLUMN_NAME_CONFIG])->delete();
    }
};

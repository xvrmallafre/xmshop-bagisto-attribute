<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    const ATTRIBUTE_FAMILY_CODE = 'default';
    const ATTRIBUTE_GROUP_CODE = 'XMShop';
    const ATTRIBUTE_CODES = ['product_files_active', 'product_files_config'];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $attributeFamily = DB::table('attribute_families')->where('code', self::ATTRIBUTE_FAMILY_CODE)->first();

        if (!$attributeFamily) {
            throw new Exception('Attribute family not found');
        }

        $generalGroup = DB::table('attribute_groups')
            ->where('attribute_family_id', $attributeFamily->id)
            ->where('code', 'general')
            ->first();

        if (!$generalGroup) {
            throw new Exception('General attribute group not found');
        }

        // Update positions of subsequent groups
        DB::table('attribute_groups')
            ->where('attribute_family_id', $attributeFamily->id)
            ->where('position', '>', $generalGroup->position)
            ->where('column', $generalGroup->column)
            ->increment('position');

        // Create the new attribute group after 'general'
        $attributeGroupId = DB::table('attribute_groups')->insertGetId([
            'name' => self::ATTRIBUTE_GROUP_CODE,
            'code' => Str::lower(self::ATTRIBUTE_GROUP_CODE),
            'attribute_family_id' => $attributeFamily->id,
            'position' => $generalGroup->position + 1,
            'column' => 1
        ]);

        $position = 1;

        foreach (self::ATTRIBUTE_CODES as $attributeCode) {
            $attribute = DB::table('attributes')->where('code', $attributeCode)->first();

            if ($attribute) {
                DB::table('attribute_group_mappings')->insert([
                    'attribute_id' => $attribute->id,
                    'attribute_group_id' => $attributeGroupId,
                    'position' => $position++
                ]);
            } else {
                throw new Exception("Attribute $attributeCode not found");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $attributeFamily = DB::table('attribute_families')->where('code', self::ATTRIBUTE_FAMILY_CODE)->first();
        $attributeGroup = DB::table('attribute_groups')->where('code', self::ATTRIBUTE_GROUP_CODE)->where('attribute_family_id', $attributeFamily->id)->first();

        if ($attributeFamily && $attributeGroup) {
            foreach (self::ATTRIBUTE_CODES as $attributeCode) {
                $attribute = DB::table('attributes')->where('code', $attributeCode)->first();

                if ($attribute) {
                    DB::table('attribute_group_mappings')->where('attribute_id', $attribute->id)->where('attribute_group_id', $attributeGroup->id)->delete();
                }
            }

            DB::table('attribute_groups')->where('id', $attributeGroup->id)->delete();
        }
    }
};
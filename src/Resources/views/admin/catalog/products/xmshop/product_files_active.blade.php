<div class="control-group" :class="[errors.has('product_files_active') ? 'has-error' : '']">
    <label for="product_files_active" class="required">{{ __('admin::app.catalog.products.product_files_active') }}</label>
    <select class="control" v-model="product.product_files_active" name="product_files_active" id="product_files_active">
        <option value="0">{{ __('admin::app.catalog.products.no') }}</option>
        <option value="1">{{ __('admin::app.catalog.products.yes') }}</option>
    </select>
    <span class="control-error" v-if="errors.has('product_files_active')">@{{ errors.first('product_files_active') }}</span>
</div>
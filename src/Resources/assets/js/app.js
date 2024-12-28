Vue.component('product-form', {
    data() {
        return {
            product: @json($product),
            product_files_config: {
                max_files: 1,
                max_size: 1024,
                allowed_formats: []
            }
        }
    },
    mounted() {
        if (this.product.product_files_config) {
            this.product_files_config = JSON.parse(this.product.product_files_config);
        }
    },
    watch: {
        'product.product_files_active': function(newVal) {
            if (newVal == 0) {
                this.product_files_config = {
                    max_files: 1,
                    max_size: 1024,
                    allowed_formats: []
                };
            }
        }
    }
});
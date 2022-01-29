<template>
    <ul class="c-panel__list">

        <ProductItem 
            v-for="product in products" 
            :key="product.id" 
            :product="product" 
            :categories="categories"
        />

    </ul>
</template>

<script>
    import ProductItem from "./ProductItem";

    export default {
        components: {
            ProductItem
        },
        props: {
            getProducts: Objects, 
            getCategories: Object
        },
        data: function() {
            return {
                products: this.getProducts.data,
                categories: this.getCategories
            }
        }
    }
</script>

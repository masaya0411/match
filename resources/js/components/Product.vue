<template>
    <ul class="c-panel__list">

        <ProductItem 
            v-for="matter in matters" 
            :key="matter.id" 
            :matter="matter" 
            :categories="this.categories"
        />

    </ul>
</template>

<script>
    export default {
        props: ['getProducts', 'getCategories'],
        data: function() {
            return {
                matters: this.getProducts.data,
                categories: this.getCategories
            }
        }
    }
</script>

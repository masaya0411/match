<template>
    <ul class="c-panel__list">

        <product-item
         v-for="matter in matters" :key="matter.id" 
         :matter="matter" :categories="categories"></product-item>

    </ul>
</template>

<script>
    export default {
        props: ['getProducts', 'getCategories'],
        data: function() {
            return {
                matters: this.getProducts.data
            }
        }
    }
</script>

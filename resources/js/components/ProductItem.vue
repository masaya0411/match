<template>

    <li class="c-panel__item">
        <a :href="'/products/' + product.id" :class="{ 'is-finished': !product.recruit_flg }" class="c-panel__link">
            <h3 class="c-panel__title">
                {{ product.title }}
            </h3>
            <div class="c-panel__badge-wrap">
                <span v-if="product.category_id === 1" class="c-panel__badge c-badge--sm">
                    {{ categories[1] }}
                </span>
                <span v-if="product.category_id === 2" class="c-panel__badge c-badge--sm">
                    {{ categories[2] }}
                </span>
            </div>
            <div class="c-panel__price-wrap">

                <p v-if="product.category_id === 1" class="c-panel__price">
                    {{ product.min_price | numberFormat }}~{{ product.max_price | numberFormat }}
                </p>
                <span v-if="product.category_id === 1" class="c-panel__unit">円</span>

                <p v-else-if="product.category_id === 2" class="c-panel__price">
                    {{ product.reward }}
                </p>

            </div>
        </a>
    </li>

</template>

<script>
    export default {
        props: {
            product: Object, 
            categories: Object
            },
        data: function() {
            return {
                product: this.product
            }
        },
        filters:{
            numberFormat: function(num) {
                var sum = num*1000;
                return sum.toLocaleString();
            }
        }
    }
</script>

<template>
    <ul class="c-panel__list">

        <li v-for="matter in matters" :key="matter.id" class="c-panel__item">
            <a :href="'/products/' + matter.id" :class="{ 'is-finished': !matter.recruit_flg }" class="c-panel__link">
                <h3 class="c-panel__title">
                    {{ matter.title }}
                </h3>
                <div class="c-panel__badge-wrap">
                    <span v-if="matter.category_id == 1" class="c-panel__badge c-badge-sm">
                        {{ categories[1] }}
                    </span>
                    <span v-if="matter.category_id == 2" class="c-panel__badge c-badge-sm">
                        {{ categories[2] }}
                    </span>
                </div>
                <div class="c-panel__price-wrap">

                    <p v-if="matter.category_id == 1" class="c-panel__price">
                        {{ matter.min_price | numberFormat }}~{{ matter.max_price | numberFormat }}
                    </p>
                    <span v-if="matter.category_id == 1" class="c-panel__unit">円</span>

                    <p v-else-if="matter.category_id == 2" class="c-panel__price">
                        {{ matter.reward }}
                    </p>

                </div>
            </a>
        </li>

    </ul>
</template>

<script>
    export default {
        props: ['products', 'categories'],
        data: function() {
            return {
                matters: this.products.data
            }
        },
        filters:{
            numberFormat: function(num) {
                var sum = num*1000;
                return sum.toLocaleString();
            }
        },
        mounted () {
            console.log(this.products);
            console.log(this.categories);
        }
    }
</script>

<template>
    <div>
        <i class="fas fa-heart p-product-detail__heart active" 
           @click="unfavorite()" v-if="result"></i>
        <i class="fas fa-heart p-product-detail__heart" 
           @click="favorite()" v-else></i>
    </div>
</template>

<script>
    export default {
        props: ['product'],
        data() {
            return {
                result: false,
            }
        },
        mounted () {
            this.hasLikes();
            console.log(this.product);
        },
        methods: {
            favorite() {
                axios.get('/products/' + this.product.id + '/likes')
                .then(res => {
                    this.result = res.data.result;
                }).catch(function(err) {
                    console.log(err);
                });
            },
            unfavorite() {
                axios.get('/products/' + this.product.id + '/unlikes')
                .then(res => {
                    this.result = res.data.result;
                }).catch(function(err) {
                    console.log(err);
                });
            },
            hasLikes() {
                axios.get('/products/' + this.product.id + '/haslikes')
                .then(res => {
                    this.result = res.data;
                }).catch(function(err) {
                    console.log(err);
                });
            }
        }
    }
</script>

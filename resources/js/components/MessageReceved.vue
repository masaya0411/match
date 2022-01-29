<template>

    <div v-if="!isMyid" class="c-comment__user c-comment__user--receved">
        <a v-if="isWithdraw" :href="'/user/0'" class="c-comment__user__avater c-comment__user__avater--receved">
            <div class="c-comment__user__avater__img">
                <img :src="'/storage/profile_images/profile.png'">
            </div>
            <p class="c-comment__user__avater__name">
                退会したユーザー
            </p>
        </a>
        <a v-else :href="'/user/' + partnerInfo.id" class="c-comment__user__avater c-comment__user__avater--receved">
            <div class="c-comment__user__avater__img">
                <img :src="'/storage/profile_images/' + partnerInfo.pic">
            </div>
            <p class="c-comment__user__avater__name">
                {{ partnerInfo.name }}
            </p>
        </a>
        <div class="c-comment__user__content">
            <div class="c-comment__user__message c-comment__user__message--receved">
                <p class="c-comment__user__text">
                    {{ comment.msg }}
                </p>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        props: {
            comment: Object, 
            partnerInfo: Object
            },
        data: function() {
            return {
                
            }
        },
        computed: {
            isMyid () {
                if(this.partnerInfo.id === this.comment.from_user) {
                    return true;
                }else{
                    return false;
                }
            },
            isWithdraw() {
                if(this.partnerInfo === null) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
</script>

<template>

    <div v-if="!isMyid" class="c-comment__user c-comment__user--receved">
        <a v-if="comment.user !== null" :href="'/user/' + comment.user.id" class="c-comment__user__avater c-comment__user__avater--receved">
            <div class="c-comment__user__avater__img">
                <img :src="'/storage/profile_images/' + comment.user.pic">
            </div>
            <p class="c-comment__user__avater__name">
                {{ comment.user.name }}
            </p>
        </a>
        <a v-else :href="'/user/0'" class="c-comment__user__avater c-comment__user__avater--receved">
            <div class="c-comment__user__avater__img">
                <img :src="'/storage/profile_images/profile.png'">
            </div>
            <p class="c-comment__user__avater__name">
                退会したユーザー
            </p>
        </a>
        <div class="c-comment__user__content">
            <div class="c-comment__user__message c-comment__user__message--receved">
                <p class="c-comment__user__text">
                    {{ comment.public_msg }}
                </p>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        props: {
            comment: Object, 
            authId: null
            },
        data: function() {
            return {
                comment: this.comment,
                auth_id: this.authId
            }
        },
        computed: {
            isMyid () {
                if(this.auth_id === this.comment.user_id) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
</script>

<template>

    <div v-if="isMyid" class="c-comment__user c-comment__user--send">
        <a :href="'/user/' + myInfo.id" class="c-comment__user__avater c-comment__user__avater--send">
            <div class="c-comment__user__avater__img">
                <img :src="'/storage/profile_images/' + myInfo.pic">
            </div>
            <p class="c-comment__user__avater__name">
                {{ myInfo.name }}
            </p>
        </a>
        <div class="c-comment__user__content">
            <div class="c-comment__user__message c-comment__user__message--send">
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
            myInfo: Object
            },
        computed: {
            isMyid () {
                if(this.myInfo.id === this.comment.from_user) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
</script>

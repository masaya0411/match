<template>
    <div v-if="comments !== null" class="c-comment">
        
        <CommentSend 
            v-for="comment in comments"
            :key="comment.id"
            :comment="comment"
            :auth-id="authId"
            />
        <CommentReceved 
            v-for="comment in comments"
            :key="comment.id"
            :comment="comment"
            :auth-id="authId"
            />

    </div>
</template>

<script>
    import CommentSend from "./CommentSend";
    import CommentReceved from "./CommentReceved";

    export default {
        components: {
            CommentSend,
            CommentReceved
        },
        props: {
            comments: Object,
            authId: Number
        },
        data: function() {
            return {
                comments: this.comments,
                authId: this.authId
            }
        }
    }
</script>

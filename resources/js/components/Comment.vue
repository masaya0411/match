<template>
    <div v-if="comments !== null" class="c-comment">
        
        <CommentSend 
            v-for="comment in comments"
            :key="`send-${comment.id}`"
            :comment="comment"
            :auth-id="auth"
            />
        <CommentReceved 
            v-for="comment in comments"
            :key="`receve-${comment.id}`"
            :comment="comment"
            :auth-id="auth"
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
            comments: Array,
            auth: null
        },
        data: function() {
            return {
                comments: this.comments,
                auth_id: this.auth
            }
        }
    }
</script>

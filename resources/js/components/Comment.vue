<template>
    <div v-if="comments !== null" class="c-comment">
        <div v-for="comment in comments" :key="comment.id" class="c-comment__list">
        
            <CommentSend 
                :comment="comment"
                :auth-id="auth"
                />
            <CommentReceved 
                :comment="comment"
                :auth-id="auth"
                />

        </div>
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

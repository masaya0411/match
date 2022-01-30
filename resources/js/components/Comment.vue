<template>
    <div v-if="!isEmpty" class="c-comment">
        <div v-for="message in messages" :key="message.id" class="c-comment__list">
        
            <CommentSend 
                :comment="message"
                :auth-id="auth"
                />
            <CommentReceved 
                :comment="message"
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
            messages: Array,
            auth: null
        },
        computed: {
            isEmpty() {
                return this.messages === null;
            }
        },
        data: function() {
            return {
                auth_id: this.auth
            }
        }
    }
</script>

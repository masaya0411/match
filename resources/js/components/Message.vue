<template>
    <div v-if="messages !== null" class="c-comment">
        <div v-for="message in messages" :key="message.id" class="c-comment__list">
        
            <MessageSend 
                :comment="message"
                :my-info="user"
                />
            <MessageReceved 
                :comment="message"
                :partner-info="partner"
                />

        </div>
    </div>
</template>

<script>
    import MessageSend from "./MessageSend";
    import MessageReceved from "./MessageReceved";

    export default {
        components: {
            MessageSend,
            MessageReceved
        },
        props: {
            messages: Array,
            user: Object,
            partner: Object
        },
        data: function() {
            return {
                
            }
        }
    }
</script>

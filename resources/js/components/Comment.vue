<template>
    <div class="c-comment">
        
        <!-- <CommentSend />
        <CommentReceved /> -->

    </div>
</template>

<script>
    // import CommentSend from "./CommentSend";
    // import CommentReceved from "./CommentReceved";

    export default {
        // components: {
        //     CommentSend,
        //     CommentReceved
        // },
        props: {
            comments: Object,
        },
        data: function() {
            return {
                comments: this.comments,
            }
        }
    }
</script>

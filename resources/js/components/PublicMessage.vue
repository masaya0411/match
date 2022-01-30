<template>
    <ul class="c-panel__list">

        <div v-if="isEmptyObject" class="c-panel__none">
            メッセージはありません
        </div>

        <PublicMessageItem v-else v-for="publicMessage in publicMessages" :key="publicMessage.id" :public-message="publicMessage"/>

    </ul>
</template>

<script>
    import moment from "moment"
    import PublicMessageItem from "./PublicMessageItem";

    export default {
        components: {
            PublicMessageItem
        },
        props: {
            publicMessages: null
        },
        computed: {
            isEmptyObject() {
                if(Object.keys(this.publicMessages).length === 0) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
</script>

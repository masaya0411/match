<template>
    <ul class="c-panel__list">
        
        <div v-if="!directBords.length" class="c-panel__none">
            メッセージはありません
        </div>

        <DirectMessageItem v-else v-for="bord in directBords" :key="bord.id" :bord="bord"/>

    </ul>
</template>

<script>
    import DirectMessageItem from "./DirectMessageItem";

    export default {
        components: {
            DirectMessageItem
        },
        props: {
            directBords: Object, 
        }
    }
</script>

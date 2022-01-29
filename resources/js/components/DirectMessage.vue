<template>
    <ul class="c-panel__list">
        
        <div v-if="!directBords.length" class="c-panel__none">
            メッセージはありません
        </div>

        <DirectMessageItem v-else v-for="bord in directBords" :key="bord.id" :bord="bord"/>

    </ul>
</template>

<script>

    export default {
        props: {
            directBords: Array, 
        }
    }
</script>

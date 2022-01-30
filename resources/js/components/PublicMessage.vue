<template>
    <ul class="c-panel__list">

        <div v-if="isEmptyObject" class="c-panel__none">
            メッセージはありません
        </div>

        <li v-else v-for="publicMessage in publicMessages" :key="publicMessage.id" class="c-panel__item">
            <a :href="'/products/' + publicMessage.id" class="c-panel__link">
                <h3 class="c-panel__title">
                    {{ publicMessage.title }}
                </h3>
                <div class="p-mypage__pb-msg__wrap">
                    <p class="p-mypage__pb-msg__text">
                        {{ publicMessage.msg.public_msg }}
                    </p>
                    <span class="p-mypage__pb-msg__time">
                        {{ formatDate(publicMessage.msg.created_at) }}
                    </span>
                </div>
            </a>
        </li>
    </ul>
</template>

<script>
    import moment from "moment"
    // import PublicMessageItem from "./PublicMessageItem";

    export default {
        // components: {
        //     PublicMessageItem
        // },
        props: {
            publicMessages: { type:Object, required: false, default: null } 
        },
        computed: {
            isEmptyObject() {
                if(Object.keys(this.publicMessages).length === 0) {
                    return true;
                }else{
                    return false;
                }
            }
        },
        methods: {
            formatDate(date) {
                if(!!date) return moment(date).format("YYYY/MM/DD hh:mm");
            }
        }
    }
</script>

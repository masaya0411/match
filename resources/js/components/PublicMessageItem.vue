<template>

        <li class="c-panel__item">
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

</template>

<script>
    import moment from "moment"

    export default {
        props: {
            publicMessage: Object
        },
        methods: {
            formatDate(date) {
                if(!!date) return moment(date).format("YYYY/MM/DD HH:mm");
            }
        }
    }
</script>

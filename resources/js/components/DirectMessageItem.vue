<template>

    <li class="c-panel__item">
        <a :href="'/direct_messages/' + bord.id" class="c-panel__link p-mypage__dm__wrap">
            <div class="p-mypage__dm__link">
                <img v-if="isWithdraw" :src="'/storage/profile_images/profile.png'">
                <img v-else :src="'/storage/profile_images/' + bord.user.pic">
            </div>
            <div class="p-mypage__dm__body">
                <p v-if="isWithdraw" class="p-mypage__dm__name">
                    退会したユーザー
                </p>
                <p v-else class="p-mypage__dm__name">
                    {{ bord.user.name }}
                </p>
                <p class="p-mypage__dm__text">
                    {{ getLatestMessage(bord.direct_messages) }}
                </p>
            </div>
        </a>
    </li>

</template>

<script>
    export default {
        props: {
            bord: Object, 
        },
        computed: {
            isWithdraw() {
                return this.bord.user === null
            }
        },
        methods: {
            getLatestMessage(messages) {
                var sortMessages = _.sortBy(messages, 'created_at').reverse();
                if(sortMessages.length) {
                    var latestMessage = sortMessages[0].msg;
                    return latestMessage;
                }else{
                    return 'まだメッセージはありません';
                }
            }
        }
    }
</script>

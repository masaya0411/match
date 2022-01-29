<template>
    <ul class="c-panel__list">
        
        <div v-if="directBords === null" class="c-panel__none">
            メッセージはありません
        </div>

        <li v-else v-for="bord in directBords" :key="bord.id" class="c-panel__item">
            <a :href="'/direct_messages/' + bord.id" class="c-panel__link p-mypage__dm__wrap">
                <div class="p-mypage__dm__link">
                    <img v-if="bord.user === null" :src="'/storage/profile_images/profile.png'">
                    <img v-else :src="'/storage/profile_images/' + bord.user.pic">
                </div>
                <div class="p-mypage__dm__body">
                    <p v-if="bord.user === null" class="p-mypage__dm__name">
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

    </ul>
</template>

<script>

    export default {
        props: {
            directBords: Array, 
        },
        data: function() {
            return {
                
            }
        },
        methods: {
            getLatestMessage(messages) {
                var sortMessages = _.sortBy(messages, 'created_at').reverse();
                console.log(sortMessages);
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

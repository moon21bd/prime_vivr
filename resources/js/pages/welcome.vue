<template>
    <div>
        <div class="top-right links">
            <template v-if="authenticated">
                <router-link :to="{ name: 'home' }">
                    {{ $t('home') }}
                </router-link>
            </template>
            <template v-else>
                <router-link :to="{ name: 'login' }">
                    {{ $t('login') }}
                </router-link>
                <router-link :to="{ name: 'register' }">
                    {{ $t('register') }}
                </router-link>
            </template>
        </div>

        <div class="text-center">
            <div class="title mb-4">
                {{ title }}
            </div>

            <div class="links">
                <a href="https://github.com/moon21bd">Raqibul Hasan Moon</a>
            </div>

            <AudioPlayer :autoplay="true" audioSource="./prompts/audio.mp3"/>

        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import AudioPlayer from '~/components/AudioPlayer';

export default {
    layout: 'basic',
    components: {
        AudioPlayer
    },
    metaInfo() {
        return {title: this.$t('home')}
    },

    data: () => ({
        title: window.config.appName,
    }),

    computed: mapGetters({
        authenticated: 'auth/check'
    }),
    methods: {}
}
</script>

<style scoped>
.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.title {
    font-size: 85px;
}
</style>

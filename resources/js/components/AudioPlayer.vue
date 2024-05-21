<template>
    <div>
        <audio ref="audio" :src="audioSource" :autoplay="autoplay" @loadedmetadata="onAudioLoaded"></audio>
        <button v-if="showControls" @click="togglePlayback">{{ isPlaying ? 'Pause' : 'Play' }}</button>
    </div>
</template>

<script>
import { Howl } from 'howler';

export default {
    props: {
        audioSource: {
            type: String,
            required: true
        },
        showControls: {
            type: Boolean,
            default: true
        }
    },
    data() {
        return {
            isPlaying: false,
            autoplay: true,
            sound: null
        };
    },
    methods: {
        togglePlayback() {
            if (this.isPlaying) {
                this.sound.pause();
            } else {
                this.sound.play();
            }
            this.isPlaying = !this.isPlaying;
        },
        onAudioLoaded() {
            if (this.autoplayRequested && !this.isPlaying) {
                this.sound.play();
                this.isPlaying = true;
            }
        }
    },
    mounted() {
        // Detect if autoplay is allowed by the browser
        const audio = new Audio();
        audio.src = ''; // Create a dummy audio element
        audio.autoplay = true; // Attempt autoplay
        audio.play().then(() => {
            // Autoplay succeeded
            this.autoplay = true;
        }).catch(() => {
            // Autoplay failed, update UI accordingly
            this.autoplay = false;
        }).finally(() => {
            // Clean up dummy audio element
            audio.remove();
        });

        // Initialize Howler.js
        this.sound = new Howl({
            src: [this.audioSource],
            autoplay: false,
            onplay: () => {
                this.isPlaying = true;
            },
            onpause: () => {
                this.isPlaying = false;
            }
        });
    },
    beforeDestroy() {
        // Cleanup audio when component is destroyed
        if (this.sound) {
            this.sound.unload(); // Unload Howler.js sound instance
        }
    },
};
</script>

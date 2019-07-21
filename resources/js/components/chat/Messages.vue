<template>
  <div class="message scroll" ref="messages">
    <div class="d-flex justify-content-center">
      <moon-loader :loading="loading"></moon-loader>
    </div>
    <message v-for="message in messages" :key="message.id" :message="message"></message>
  </div>
</template>

<script>
import MoonLoader from 'vue-spinner/src/MoonLoader.vue'
import { setTimeout } from 'timers';
export default {
  created() {
    this.loadMessages()
  },
  data() {
    return {
      loading: false
    }
  },
  computed: {
    messages() {
      //   return this.$store.state.chat.messages
      return this.$store.getters.messages
    }
  },
  methods: {
    loadMessages() {
      this.loading = true
      this.$store.dispatch('loadMessages')
        .finally(() => {
          this.loading = false
          this.scrollMessages()
        })
    },
    scrollMessages() {
      setTimeout(() => {
        this.$refs.messages.scrollTo(0, this.$refs.messages.scrollHeight)
      }, 1000)
    }
  },
  watch: {
    messages() {
      this.scrollMessages()
    }
  },
  components: {
    MoonLoader
  }
}
</script>


<style scoped>
.message {
  height: 600px;
  max-height: 600px;
  overflow-x: hidden;
  overflow-y: auto;
  margin-top: 5%;
}
</style>

<template>
  <div>
    <messages />
    <div class="form-group">
      <textarea
        v-model="body"
        @keydown="keydownMessage"
        placeholder="Mensagem aqui"
        class="form-control"
      ></textarea>
    </div>
    <button :disabled="loading" class="btn btn-success" @click.prevent="sendMessage">
      Enviar
      <pulse-loader :loading="loading" :color="'#fff'" :size="'9px'" class="float-right"></pulse-loader>
    </button>
  </div>
</template>

<script>

import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

export default {
  components: {
    PulseLoader
  },
  data() {
    return {
      body: "",
      loading: false
    }
  },
  methods: {
    sendMessage() {
      if (!this.body || this.body.trim() == '' || this.loading)
        return
      this.loading = true
      this.$store.dispatch("storeMessage", { body: this.body })
        .then(() => (this.body = ""))
        .finally(() => this.loading = false)

    },
    keydownMessage(e) {
      if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault()
        this.sendMessage()
      }
    }
  }
}
</script>

<style scoped>
</style>

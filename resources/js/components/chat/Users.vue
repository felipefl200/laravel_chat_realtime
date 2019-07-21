<template>
  <div>
    <div class="online">{{users.length}} online</div>
    <div class="users scroll">
      <div class="user" v-for="(user, index) in users" :key="index">
        <div class="user-img" v-if="user.image">
          <img :src="`/storage/users/${user.image}`" :alt="user.name" />
        </div>
        <div class="user-img" v-else>
          <img src="/img/user.png" alt="" />
        </div>
        <strong>{{user.name}}</strong>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    users() {
      return this.$store.state.chat.users
    }
  }
}
</script>

<style scoped>
.users {
  float: left;
  width: 100%;
  overflow-x: hidden;
  overflow-y: auto;
  height: 600px;
  max-height: 600px;
}
.user {
  float: left;
  width: 100%;
}
.user-img {
  float: left;
}
.user-img img {
  max-width: 50px;
  padding: 5px;
  border-radius: 100%;
}
.user strong {
  float: left;
  margin: 14px 0px 0px 5px;
  color: #ffffff;
}
.online {
  margin: 20px 0px 20px 30%;
  font-size: 16pt;
  color: #ffffff;
}
</style>

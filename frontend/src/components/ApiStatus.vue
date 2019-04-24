<template>
  <div>
    <div v-if="users">
      <p v-for="user in users">{{ user.name }}</p>
    </div>
    <div v-else>
      Loading...
    </div>
  </div>
</template>

<script>
  import axios from "axios";

  export default {
    name: 'ApiStatus',
    data() {
      return {
        users: null
      }
    },
    mounted() {
      axios.get('/').then(response => {
        this.users = response.data.users;
      });
    },
  }
</script>
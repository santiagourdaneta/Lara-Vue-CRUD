<template>
  <div>
    <slot></slot>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        //
      }
    },
    mounted() {
      this.getUsers()

      this.$root.$on('dataDeleted', this.deleteUser)
    },
    methods: {
      getUsers() {
        const vm = this

        axios.get(`/api/users`)
          .then(({data}) => {
            Vue.set(vm.$root.additional, 'users', data.data)
          })
      },
      deleteUser(id) {
        if (confirm('Confirma eliminar a este usuario?')) {
          const vm = this

          this.$root.form.delete(`/api/users/${id}`)
            .then(response => {
              vm.$root.additional.users.splice(_.findIndex(
                vm.$root.additional.users, {id}
              ), 1)

              vm.$root.alert.message = 'User has been successfully deleted.'
            })
        }
      }
    }
  }
</script>

<template>
  <div class="container">
    <div
      v-if="$page.flash.success"
      class="alert alert-success alert-dismissible fade show"
      role="alert"
    >
      {{ $page.flash.success }}
      <button
        type="button"
        class="close"
        data-dismiss="alert"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
    mounted() {
        setTimeout(() => {
            this.$emit("hide-flash-message")
        }, 5000)
    }
}
</script>

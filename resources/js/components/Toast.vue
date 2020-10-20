<template>
  <div
    class="bg-indigo-300 duration-200 fixed top-0 transform transition-transform w-full"
    :class="[showing ? '': '-translate-y-full']"
  >
    <p
      class="font-bold px-8 py-4 text-center text-indigo-700 text-sm tracking-wide uppercase"
    >{{ message }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      showing: false
    }
  },
  computed: {
    message() {
      return this.$page.props.toast_message
    }
  },
  watch: {
    message: {
      handler: function(value) {
        if (!value) return

        this.showing = true

        setTimeout(() => {
          this.showing = false
        }, 3000)
      },
      immediate: true
    }
  }
}
</script>

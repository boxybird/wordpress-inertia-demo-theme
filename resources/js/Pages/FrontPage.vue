<template>
  <Layout>
    <transition
      tag="div"
      enter-active-class="duration-200 transition-all"
      leave-active-class="duration-200 transition-all"
      enter-class="opacity-75 transform translate-y-8"
    >
      <div v-html="page.post_content" v-if="loaded"></div>
    </transition>
  </Layout>
</template>

<script>
export default {
  props: ['page'],
  data() {
    return {
      loaded: false
    }
  },
  mounted() {
    this.$nextTick(() => (this.loaded = true))
  }
}
</script>

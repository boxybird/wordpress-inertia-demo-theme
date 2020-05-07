<template>
  <Layout>
    <transition
      tag="div"
      enter-active-class="duration-200 transition-all"
      leave-active-class="duration-200 transition-all"
      enter-class="opacity-75 transform translate-y-8"
    >
      <div>
        <h1 class="text-xl">{{ page.post_title }}</h1>
        <div v-html="page.post_content"></div>
      </div>
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

<template>
  <Layout>
    <transition
      tag="div"
      enter-active-class="duration-200 transition-all"
      leave-active-class="duration-200 transition-all"
      enter-class="opacity-75 transform translate-y-8"
    >
      <div class="space-y-4" v-if="loaded">
        <h1 class="text-xl">{{ title }}</h1>
        <div class="space-y-4" v-html="content"></div>
      </div>
    </transition>
  </Layout>
</template>

<script>
export default {
  props: ['title', 'content'],
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

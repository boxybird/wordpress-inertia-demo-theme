<template>
  <Layout>
    <transition
      tag="div"
      enter-active-class="duration-200 transition-all"
      leave-active-class="duration-200 transition-all"
      enter-class="opacity-75 transform translate-y-8"
    >
      <div class="max-w-2xl min-h-screen mx-auto space-y-8" v-if="loaded">
        <!-- Traditional form lives in Gutenberg block -->
        <div>
          <h3>Traditional POST request</h3>
          <div class="mt-2 space-y-4" v-html="content"></div>
        </div>

        <!-- Vue form lives here -->
        <div>
          <h3>AJAX POST request</h3>
          <form
            class="flex flex-col items-start mt-2 sm:flex-row"
            @submit.prevent="submit"
          >
            <input
              class="bg-gray-200 h-12 px-4 rounded w-full"
              type="text"
              placeholder="Type anything..."
              v-model="toastMessage"
            />
            <button
              class="bg-indigo-300 duration-300 font-bold h-12 hover:bg-indigo-400 hover:text-indigo-800 mt-4 px-4 rounded sm:ml-4 sm:mt-0 text-indigo-700 text-sm tracking-wide transition-colors uppercase"
            >Submit</button>
          </form>
        </div>
      </div>
    </transition>
  </Layout>
</template>

<script>
export default {
  props: ['title', 'content'],
  data() {
    return {
      loaded: false,
      toastMessage: ''
    }
  },
  mounted() {
    this.$nextTick(() => (this.loaded = true))
  },
  methods: {
    async submit() {
      let { data } = await axios.post('/wp-json/inertia-theme/v1/toast', {
        toastMessage: this.toastMessage
      })

      this.$page.props.toast_message = data.toast_message
      this.toastMessage = ''
    }
  }
}
</script>

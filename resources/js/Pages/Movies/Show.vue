<template>
  <Layout>
    <transition
      enter-active-class="duration-300 transition-all"
      leave-active-class="duration-300 transition-all"
      enter-class="opacity-75 transform -translate-x-8"
    >
      <div class="gap-8 grid grid-cols-1 sm:grid-cols-3" v-if="loaded">
        <div class="col-span-1">
          <img class="rounded w-full" :src="movie.poster" :alt="`${movie.title} Poster`" />
        </div>
        <div class="col-span-1 max-w-xl sm:col-span-2 sm:ml-4">
          <h1 class="text-2xl">{{ movie.title }}</h1>
          <div class="flex items-center mt-2 space-x-2 text-gray-700 text-sm">
            <div class="flex items-center space-x-1">
              <svg
                class="h-4 w-4"
                fill="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                />
              </svg>
              <span>{{ movie.meta.vote_average }}</span>
            </div>
            <span>|</span>
            <span>{{ movie.meta.release_date }}</span>
          </div>
          <div class="mt-8">{{ movie.content }}</div>
          <a
            class="bg-indigo-300 duration-300 font-bold inline-block mt-10 px-4 py-4 rounded text-indigo-700 text-sm tracking-wide transition-colors uppercase hover:bg-indigo-400 hover:text-indigo-800"
            :class="{'opacity-50 pointer-events-none': !movie.meta.homepage}"
            :href="movie.meta.homepage"
            target="_blank"
          >{{ movie.meta.homepage ? 'Movie Homepage' : 'Not Available' }}</a>
        </div>
      </div>
    </transition>
  </Layout>
</template>

<script>
export default {
  props: ['movie'],
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

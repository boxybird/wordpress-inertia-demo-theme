<template>
  <Layout>
    <div class="flex space-x-8">
      <inertia-link
        class="bg-indigo-300 duration-300 font-bold px-4 py-4 rounded text-center text-indigo-700 text-sm tracking-wide transition-colors uppercase w-full hover:bg-indigo-400 hover:text-indigo-800"
        :class="{'opacity-50 pointer-events-none': !pagination.prev_page}"
        :href="`/movies/page/${pagination.prev_page}`"
        preserve-scroll
      >Prev</inertia-link>
      <inertia-link
        class="bg-indigo-300 duration-300 font-bold px-4 py-4 rounded text-center text-indigo-700 text-sm tracking-wide transition-colors uppercase w-full hover:bg-indigo-400 hover:text-indigo-800"
        :class="{'opacity-50 pointer-events-none': pagination.next_page > pagination.total_pages}"
        :href="`/movies/page/${pagination.next_page}`"
        preserve-scroll
      >Next</inertia-link>
    </div>
    <transition-group
      class="gap-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
      enter-active-class="duration-300 transition-all"
      leave-active-class="duration-300 transition-all"
      enter-class="opacity-75 transform translate-y-8"
      tag="div"
    >
      <template v-if="loaded">
        <div class="mt-8" v-for="movie in movies" :key="movie.id">
          <inertia-link :href="movie.link">
            <img
              class="rounded w-full"
              :src="movie.poster"
              :alt="`${movie.title} Poster`"
            />
            <h3 class="mt-2 truncate">{{ movie.title }}</h3>
          </inertia-link>
        </div>
      </template>
    </transition-group>
  </Layout>
</template>

<script>
export default {
  props: ['movies', 'pagination'],
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

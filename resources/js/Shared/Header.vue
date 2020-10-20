<template>
  <header>
    <div class="bg-gray-200 border-b border-gray-300">
      <div
        class="container flex items-center justify-between max-w-6xl mx-auto p-8 text-lg"
      >
        <div class="space-y-2">
          <div class="flex items-center space-x-2">
            <svg
              class="h-8 w-8"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"
              />
            </svg>
            <h1 class="font-bold">{{ $page.props.site.name }}</h1>
          </div>
          <p
            class="text-sm tracking-wide uppercase"
          >{{ $page.props.site.description }}</p>
        </div>
        <ul
          class="font-bold hidden items-center space-x-4 text-gray-700 text-sm tracking-wide uppercase sm:flex"
        >
          <li v-for="item in $page.props.primary_menu" :key="item.id">
            <inertia-link :href="item.link">{{ item.name }}</inertia-link>
          </li>
        </ul>
      </div>
    </div>
    <div class="border-b border-gray-200">
      <div
        class="container flex font-bold items-center justify-between max-w-6xl mx-auto px-8 py-4 text-gray-700 text-sm tracking-wide uppercase"
      >
        <nav class="space-x-8">
          <inertia-link href="/">Home</inertia-link>
          <div class="inline-block">
            <div class="flex items-center">
              <inertia-link href="/movies">Movie List</inertia-link>
              <svg
                class="bounce h-4 ml-2 w-4"
                v-if="isFrontPage"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
            </div>
          </div>
        </nav>
        <inertia-link href="/post-requests">POST Requests</inertia-link>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  computed: {
    isFrontPage() {
      return this.$inertia.page.component === 'FrontPage' ? true : false
    }
  }
}
</script>

<style scoped>
.bounce {
  animation: bounce 1500ms;
  animation-iteration-count: infinite;
}

@keyframes bounce {
  0% {
    transform: translateX(0.5rem);
  }

  50% {
    transform: translateX(0);
  }

  100% {
    transform: translateX(0.5rem);
  }
}
</style>
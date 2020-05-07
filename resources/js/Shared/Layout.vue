<template>
  <div class="font-display text-gray-800">
    <Header />
    <main class="container max-w-6xl mt-8 mx-auto px-8">
      <slot></slot>
    </main>
    <Toast />
    <Footer />
  </div>
</template>

<script>
import Header from './Header'
import Footer from './Footer'
import Toast from '../components/Toast'

export default {
  components: {
    Header,
    Footer,
    Toast
  }
}
</script>

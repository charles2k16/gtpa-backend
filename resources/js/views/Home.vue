<template>
  <div>
    <Header />
    <Hero />
    <HowItWorks />
    <Purpose />
    <Testimonials />
    <Subscribe />
    <Footer />
  </div>
</template>


<script>
import Header from './sections/Header'
import Hero from './sections/Hero'
import HowItWorks from './sections/HowItWorks'
import Purpose from './sections/Purpose'
import Testimonials from './sections/Testimonials'
import Subscribe from './sections/Subscribe'
import Footer from './sections/Footer'

export default {
  name: 'Home',
  components: {Header, Hero, HowItWorks, Purpose, Testimonials, Subscribe, Footer}
}
</script>
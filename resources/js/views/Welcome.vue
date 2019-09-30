<template>
  <div>
    <AuthHeader />
    <section class="inner_wrap form_wrap registration_wrap">
          <div class="container">
              <div class="row">
                  <div class="col-md-10">
                    <h2 class="big_title">Welcome {{userName}}</h2>

                    <p class="verify_p"><a href="" class="link">
                      <router-link to="/profile">
                      Please click here to complete your profile.
                    </router-link></a></p>

                  </div>
              </div>
          </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import AuthHeader from './sections/AuthHeader'
import Footer from './sections/Footer'

export default {
  name: 'Login',
  components: {AuthHeader, Footer},
  data: () => ({
    userName: ''
  }),
  created () {
    this.userName = this.$route.query.id
  }
}
</script>
<template>
  <div>
    <Header />
    <section class="inner_wrap form_wrap registration_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 class="big_title">{{title}}</h2>

            </div>
            <div class="col-md-6">
                <div class="contact_form">
                    <p class="form_head">Create New Account</p>
                    <p>Some information as to what is expected of the user with regards to what details should be collected on this form.</p>
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input type="text" class="form-control" v-model="addMentorForm.name" aria-describedby="nameHelp" placeholder="John Doe">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" class="form-control" v-model="addMentorForm.email" aria-describedby="emailHelp" placeholder="example@mail.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="passowrd" class="form-control number" placeholder="********" v-model="addMentorForm.password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Confirm Password</label>
                                    <input type="passowrd" class="form-control number" placeholder="********" v-model="addMentorForm.password_confirmation">
                                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="********"></textarea> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Type</label>
                                    <input type="text" class="form-control number" v-model="addMentorForm.type" value="Mentor">
                                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="********"></textarea> -->
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary red_btn" @click="registerMentor()">Complete</button>
                                </div>
                                
                            </form>
                        </div>
            </div>
        </div>
    </div>
</section>
    <Subscribe />
    <Footer />
  </div>
</template>

<script>
import Header from './sections/Header'
import Subscribe from './sections/Subscribe'
import Footer from './sections/Footer'

export default {
  name: 'Register',
  components: {Header, Subscribe, Footer},
  data: () => ({
    title: 'Mentor Registration',
    addMentorForm: {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      type: 'mentor'
    },
  }),
  created () {
    console.log( this.$route.query.type)
  },
  methods: {
    registerMentor () {
      console.log(this.addMentorForm)
      this.$router.push({ path: '/welcome', query: { id: this.addMentorForm.name} })
    }
  }
}
</script>
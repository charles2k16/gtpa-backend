<template>
  <div>
    <Header />
    <section class="inner_wrap form_wrap registration_wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <h2 class="big_title">Login</h2>
            <h6>Don't have an Account? You can <router-link to="/register">click here to register </router-link> and sign up as a Mentor or Mentee</h6>
          </div>
          <div class="col-md-6">
            <div class="contact_form">
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@mail.com">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="passowrd" class="form-control number" placeholder="********">
                </div>
                <div class="form-group form-check">
                  <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                  </div>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-primary red_btn">Login</button>
                  <span class="forgot_pass"><a href="reset.php">Forgot Password?</a></span>
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
  name: 'Login',
  components: {Header, Subscribe, Footer}
}
</script>
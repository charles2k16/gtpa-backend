<template>
  <div>
    <AuthHeader />
    <section class="inner_wrap form_wrap profile_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="big_title">Complete Your Profile</h2>

                </div>
                <div class="col-md-8">
                    <div class="contact_form">
                        <form class="form">

                            <div class="form-group row">
                                <label for="exampleInputName1" class="col-sm-4">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="age" placeholder="John Doe">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputAge1" class="col-sm-4">Age</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputAge1" aria-describedby="age" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputOccupation1" class="col-sm-4">Occupation</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputOccupation1" aria-describedby="occupation" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputorganization1" class="col-sm-4">Organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputorganization1" aria-describedby="organization" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputbio1" class="col-sm-4">About/Bio</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control bio_field" id="exampleInputbio1" aria-describedby="bio" placeholder=""></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputcountry1" class="col-sm-4">Country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputcountry1" aria-describedby="country" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputcity1" class="col-sm-4">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputcity1" aria-describedby="city" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputphone1" class="col-sm-4">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputphone1" aria-describedby="phone" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputareas1" class="col-sm-4">Preferred Mentorship Areas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputareas1" aria-describedby="areas" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputemail1" class="col-sm-4">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="exampleInputemail1" aria-describedby="email" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputphoto1" class="col-sm-4">Photograph</label>
                                <div class="col-sm-8">
                                    <div class="upload_wrap">
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputphoto1" class="col-sm-4"></label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-primary red_btn" @click="profileUpdate()">Upload Profile</button>
                                </div>
                            </div>

                        </form>
                    </div>
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
  name: 'Profile',
  components: {AuthHeader, Footer},
  data: () => ({
    userName: ''
  }),
  methods: {
    profileUpdate () {
      this.$router.push({ path: '/assigned_mentee', query: { id: 12} })
    }
  }
}
</script>
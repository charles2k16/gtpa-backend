<template>
  <header>
    <div class="container">
      <a class="navbar-brand" href="#">
        <div class="logo"><img src="img/logo2.png"></div>
      </a>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        
          <a href="" class="nav-link out">
            <router-link to="/login">
            <span class="login"><i class="fas fa-user"></i></span>
            </router-link>
          </a>
  

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/">
              <a class="nav-link" href="">Home</a>
              </router-link>
            </li>
            <li class="nav-item active" v-for="(types, index) in user_type" :key="index">
              <router-link :to="{name: 'Register', query: {type: types}}">
                <a class="nav-link" >Register as {{types}}</a>
              </router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>


<script>
export default {
  name: 'Header',
  data: () => ({
    user_type: ['Mentor', 'Mentee'],
  }),
  methods: {
    mentorRegister () {
      let self = this
      this.$router.push({ path: 'register', query: { type: self.typeMentor} })
    },
    menteeRegister () {
     
   
    }
  }
}
</script>
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
        
        

        <div class="nav-item" id="account">
          <div class="nav-item dropdown">
            <a href="" class="in nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="image"><img src="img/charl.png"></span>
            </a>
            <div class="dropdown-menu">
              <router-link to="/profile">
                <a class="dropdown-item" href=""><i class="far fa-user menu_icon"></i>Account</a>
              </router-link>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt menu_icon"></i>Logout</a>
            </div>
        </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/">
              <a class="nav-link" href="">Home</a>
              </router-link>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mentor</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>


<script>
export default {
  name: 'AuthHeader',
  data: () => ({
    
  }),
  methods: {
    
  }
}
</script>
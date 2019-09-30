<template>
<div class="mentee_mentors">
  <div class="row">
    <div class="col-sm-6">
      <div class="mentor_list">
        <ul>
          <li class="item">
            <a href="">
              <div class="row">
                <div class="col col-sm-2">
                  <div class="photo">
                    <img src="img/charl.png">
                  </div>
                </div>
                <div class="col col-8 col-sm-6">
                  <div class="info">
                    <p class="name">Firstname Surname</p>
                    <p class="title">Tech Entrepreneur</p>
                  </div>
                </div>
                <div class="col col-sm-4">
                  <div class="duration">
                    <p>50%</p>
                  </div>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="mentor_details">
        <p class="name">Firstname Surname <span class="btn"><a href="">Send Message</a></span></p>
        <p>Age: <span>22</span></p>
        <p>Duration: <span>6 Months</span></p>
        <p>Email: <span>example@mail.com</span></p>
        <p>Occupation: <span>Student</span></p>
        <p>Organization: <span>Organization Name</span></p>
        <p>Country: <span>UK</span></p>
        <p>City: <span>London</span></p>
        <p>Phone: <span>1234567890</span></p>

        <div class="bio">
          <h3>About/Bio</h3>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'MenteeListCard'
}
</script>
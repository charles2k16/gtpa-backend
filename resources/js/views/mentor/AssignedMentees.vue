<template>
  <div>
    <AuthHeader />
     <section class="inner_wrap form_wrap dashboard_wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="big_title">Dashboard</h2>
          </div>
        </div>
        <div class="row">
          <div class="content_wrap">
            <div class="head_titles">
              <div class="row">
                <div class="col col-3 item active"><a href="mentor_assignments.php"><i class="fas fa-user-tie"></i>Assignments</a></div>
                <div class="col col-3 item"><a href="mentor_my_requests_accept.php"><i class="fas fa-feather"></i>Requests</a></div>
                <div class="col col-3 item"><a href="mentor_messages.php"><i class="fas fa-comment"></i>Messages</a></div>
                <div class="col col-3 item"><a href="mentor_feedback.php"><i class="fas fa-reply"></i>Feedback</a></div>
              </div>
            </div>

            <div class="content_body">
              <MenteeListCard />
            </div>
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import AuthHeader from '../sections/AuthHeader'
import MenteeListCard from '../../components/MenteeListCard'
import Footer from '../sections/Footer'

export default {
  name: 'AssignedMentee',
  components: {MenteeListCard,AuthHeader, Footer}
}
</script>
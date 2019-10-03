function getApiUrl () {
  let hn = window.location.hostname
  if (hn === 'localhost') {
    return 'http://127.0.0.1:8000/api/'
  } else if (hn === 'devstress.dev') {
    return 'https://devstress.dev/api/'
  }
  return 'http://127.0.0.1:8000/api/'
}

const API_URL = getApiUrl();

export default {
  USERS_URL: API_URL + 'users',
  MENTORS_URL: API_URL + 'mentors',
  MENTEES_URL: API_URL + 'mentees',
  REQUESTS_URL: API_URL + 'requests',
  LOGIN_URL: API_URL + 'login',
  REGISTER_URL: API_URL + 'register',
  LOGGED_IN_USER_URL: API_URL + 'currentuser'
}
import Vue from 'vue'
import axios from 'axios'
import config from '../config'

Vue.use(axios)

export default {
  name: 'mentorsService',

  getMentors () {
    let url = config.MENTORS_URL
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getMentorByiD (mentorId) {
    let url =  config.MENTORS_URL + '/' + mentorId
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getMentorRequest (mentorId) {
    let url =  config.MENTORS_URL + '/' + mentorId + '/request'
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  addMentor (mentor) {
    let url = config.MENTORS_URL
    return axios.post(url, mentor)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  updateMentor (mentor) {
    let url = config.MENTORS_URL + '/' + mentor.id
    return axios.put(url, mentor)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  removeMentor (mentorId) {
    let url = config.MENTORS_URL + '/' + mentorId
    return axios.delete(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  }

}

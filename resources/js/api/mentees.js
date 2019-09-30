import Vue from 'vue'
import axios from 'axios'
import config from '../config'

Vue.use(axios)

export default {
  name: 'menteesService',

  getMentees () {
    let url = config.MENTEES_URL
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getMenteesByiD (menteeId) {
    let url =  config.MENTEES_URL + '/' + menteeId
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getMenteeRequest (menteeId) {
    let url =  config.MENTEES_URL + '/' + menteeId + '/request'
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  addMentee (mentee) {
    let url = config.MENTEES_URL
    return axios.post(url, mentee)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  updateMentee (mentee) {
    let url = config.MENTEES_URL + '/' + mentee.id
    return axios.put(url, mentee)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  removeMentee (menteeId) {
    let url = config.MENTEES_URL + '/' + menteeId
    return axios.delete(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  }

}

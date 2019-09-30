import Vue from 'vue'
import axios from 'axios'
import config from '../config'

Vue.use(axios)

export default {
  name: 'requestService',

  getRequests () {
    let url = config.REQUESTS_URL
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getRequestByiD (requestId) {
    let url =  config.REQUESTS_URL + '/' + requestId
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  addRequest (request) {
    let url = config.REQUESTS_URL
    return axios.post(url, request)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  updateRequest (request) {
    let url = config.REQUESTS_URL + '/' + request.id
    return axios.put(url, request)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  removeRequest (requestId) {
    let url = config.MENTORS_URL + '/' + requestId
    return axios.delete(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  }
}

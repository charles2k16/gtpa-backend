import Vue from 'vue'
import axios from 'axios'
import config from '../config'

Vue.use(axios)

export default {
  name: 'userService',

  getUsers () {
    let url = config.USERS_URL
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getUserByiD (userId) {
    let url =  config.USERS_URL + '/' + userId
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getUserByMentors (userId) {
    let url =  config.USERS_URL + '/' + userId + '/mentors'
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  getUserByMentees (userId) {
    let url =  config.USERS_URL + '/' + userId + '/mentees'
    return axios.get(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  addUser (user) {
    let url = config.USERS_URL
    return axios.post(url, user)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  updateUser (user) {
    let url = config.USERS_URL + '/' + user.id
    return axios.put(url, user)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  },

  removeUser (userId) {
    let url = config.USERS_URL + '/' + userId
    return axios.delete(url)
      .then((response) => Promise.resolve(response.data))
      .catch((error) => Promise.reject(error))
  }

}

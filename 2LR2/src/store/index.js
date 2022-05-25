import { createStore } from 'vuex'
import books from './books';
import authors from './authors';
export default createStore({
  modules: {
    books,
    authors,
  },
  state: {},
  mutations: {},
  actions: {},
})
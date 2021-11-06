
let hotel = require('./components/hotels/index.vue').default;
let hotelBook = require('./components/hotels/store.vue').default;
//room
let room = require('./components/Room/index.vue').default;
let storeRoom = require('./components/Room/create.vue').default;
//location
let location = require('./components/location/index.vue').default;
let locationStore = require('./components/location/create.vue').default;
let login = require('./components/auth/login.vue').default;
//home
let home = require('./components/home.vue').default;
let logout = require('./components/auth/logout.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;

export const routes = [
  { path: '/hotel', component: hotel, name:'hotel'},
  { path: '/hotelBook', component: hotelBook, name:'hotelBook'},
  { path: '/room', component: room, name:'room'},
  { path: '/storeRoom', component: storeRoom, name:'storeRoom'},
//location
  { path: '/location', component: location, name:'location'},
  { path: '/locationStore', component: locationStore, name:'locationStore'},
  //home
  { path: '/', component: home, name:'home'},
  { path: '/home', component: home, name:'home'},
  { path: '/logout', component: logout, name:'logout'},
  { path: '/forget', component: forget, name:'forget'},
  { path: '/register', component: register, name:'register'},
  { path: '/login', component: login, name:'login'},

]
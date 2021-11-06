<template>
  <div>
    <div class="row">
      <router-link to="/room" class="btn btn-primary"
        >All room
      </router-link>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">booking room</h1>
                  </div>

                  <form class="user" @submit.prevent="room">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Enter the number of available room"
                            v-model="form.number"
                          />
                          <small class="text-danger" v-if="errors.number">
                            {{ errors.number[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Enter the status of available room"
                            v-model="form.status"
                          />
                          <small class="text-danger" v-if="errors.status">
                            {{ errors.status[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputFirstName"
                            placeholder="Enter the price of available room"
                            v-model="form.price"
                          />
                          <small class="text-danger" v-if="errors.price">
                            {{ errors.price[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <select
                            v-model="form.bookingType"
                            class="form-control"
                            aria-label="Default select example"
                          >
                            <option selected>Open this select menu</option>
                            <option value="single">single</option>
                            <option value="dpuble">double</option>
                            <option value="suite">suite</option>
                          </select>
                          <small class="text-danger" v-if="errors.bookingType">
                            {{ errors.bookingType[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <select
                            v-model="form.location"
                            class="form-control"
                            aria-label="Default select example"
                          >
                            <option selected>Open this select menu</option>
                            <option   v-for="location in locations" :key="location.id" :value="location.id">{{location.location}}</option>
                          </select>
                          <small class="text-danger" v-if="errors.location">
                            {{ errors.location[0] }}
                          </small>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">
                        Submit
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script type="text/javascript">
export default {
  created() {
    this.allLocation();
    if (!User.loggedIn()) {
      this.$router.push({ name: "login" });
    }
  },
  data() {
    return {
      form: {
        number: null,
        status: null,
        price: null,
        location: null,
        bookingType: null,
        name: User.name(),
      },
      errors: {},
      locations: [],
    };
  },
  methods: {
    allLocation() {
      axios
        .get("/api/location/")
        .then(({ data }) => (this.locations = data))
        .catch();
    },
    room() {
      axios
        .post("/api/room", this.form)
        .then(() => {
          this.$router.push({ name: "room" });
        })
        .catch((error) => (this.errors = error.response.data.errors));
    },
  },
};
</script>


<style type="text/css">
</style>
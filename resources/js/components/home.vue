  

<template>
  
  <div>

 <div class="row">
   
 </div>
<br>
   <input v-if="rooms.length>0" type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">

<h3 class="text-center" v-if="rooms.length == 0">no room here </h3>
<br>

   <div class="row"  v-if="rooms.length>0">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Rooms List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Room type</th>
                        <th>Room number</th>
                        <th>Room status</th>
                        <th>Room price</th>
                        <th>available</th>
                        <th>location</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="room in filtersearch" :key="room.id">
                        <td> {{ room.bookingType }} </td>
                        <td> {{ room.number }} </td>
                        <td> {{ room.status }} </td>
                        <td> {{ room.price }} </td>
                        <td> {{ room.available }} </td>
                        <td> {{ room.location.location }} </td>
                       

                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->


   
  </div>


</template>



<script type="text/javascript">
  
  export default {
  created(){
      this.allRoom();
      if (!User.loggedIn()) {
        this.$router.push({name: 'login'})
      }
  },
    data(){
      return{
        rooms:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.rooms.filter(room => {
         return room.bookingType.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allRoom(){
      axios.get('/api/room/')
      .then(({data}) => (this.rooms = data,console.log(data)))
      .catch()
    },
  deleteRoom(id){
             Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.delete('/api/room/'+id)
               .then(() => {
                this.rooms = this.rooms.filter(room => {
                  return room.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'room'})
               })
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })

  } 

  },

  

  } 
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>
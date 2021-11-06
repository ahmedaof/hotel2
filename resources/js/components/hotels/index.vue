  

<template>
  
  <div>

 <div class="row">
   
 </div>
<br>
   <input v-if="hotels.length>0" type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">

<h3 class="text-center" v-if="hotels.length == 0">no booking yet </h3>
<br>

   <div class="row"  v-if="hotels.length>0">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">hotels List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>location </th>
                        <th> type</th>
                        <th> name</th>
                        <th> discount</th>
                 
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="hotel in filtersearch" :key="hotel.id">
                        <td> {{ hotel.location.location }} </td>
                        <td> {{ hotel.bookingType }} </td>
                        <td> {{ hotel.name }} </td>
                        <td> {{ hotel.discount }} </td>
  
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
         this.allHotel();
      if (!User.loggedIn()) {
        this.$router.push({name: 'login'})
      }
    },
    data(){
      return{
        hotels:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.hotels.filter(hotel => {
         return hotel.name.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allHotel(){
      axios.get('/api/hotel/')
      .then(({data}) => (this.hotels = data))
      .catch()
    },
  deleteHotel(id){
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
                axios.delete('/api/hotel/'+id)
               .then(() => {
                this.hotels = this.hotels.filter(hotel => {
                  return hotel.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'hotel'})
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
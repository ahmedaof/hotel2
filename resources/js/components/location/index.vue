  

<template>
  
  <div>

 <div class="row">
   
 </div>
<br>
   <input v-if="locations.length>0" type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Here">

<h3 class="text-center" v-if="locations.length == 0">no location here </h3>
<br>

   <div class="row"  v-if="locations.length>0">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">locations List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>location </th>
                        <th> branch</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="location in filtersearch" :key="location.id">
                        <td> {{ location.location }} </td>
                        <td> {{ location.branch }} </td>
   
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
         this.allLocation();
      if (!User.loggedIn()) {
        this.$router.push({name: 'login'})
      }
    },
    data(){
      return{
        locations:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
      return this.locations.filter(location => {
         return location.location.match(this.searchTerm)
      }) 
      }
    },
 
  methods:{
    allLocation(){
      axios.get('/api/location/')
      .then(({data}) => (this.locations = data))
      .catch()
    },
  deleteLocation(id){
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
                axios.delete('/api/location/'+id)
               .then(() => {
                this.locations = this.locations.filter(location => {
                  return location.id != id
                })
               })
               .catch(() => {
                this.$router.push({name: 'location'})
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
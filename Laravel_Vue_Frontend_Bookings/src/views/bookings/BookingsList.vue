<template>
  <div>
     
    
       <div class="w3-col m3">
           <div class="card col-md-8  shadow-lg p-3 mb-5 bg-white rounded" style="width: 17rem; margin-top:43px; position:fixed;">
            <h1 style="color:DarkSlateGray; font-weight:normal; font-size:30px;">Create Bookings</h1>
            <hr>
               <div class="card-body bg-info ">
                 <div>
                   <label for="title">Operator &nbsp;</label>
                   <input type="text" v-model="booking.operator" class="w3-input w3-border" >
                 </div>
                 
                 <div>
                  <label for="title">Bus Name &nbsp;</label>
                  <input type="text" v-model="booking.bus_name" class="w3-input w3-border">
                 </div>

                  <div>
                  <label for="title">Point Of Origin &nbsp;</label>
                  <input type="text" v-model="booking.point_of_origin" class="w3-input w3-border">
                 </div>
                 
                  <div>
                  <label for="title">Destination &nbsp;</label>
                  <input type="text" v-model="booking.destination" class="w3-input w3-border">
                 </div>
                 
                  <div>
                  <label for="title">Passenger Name &nbsp;</label>
                  <input type="text" v-model="booking.passenger_name" class="w3-input w3-border">
                 </div>
                 
                  <button class="btn btn-sm btn-secondary border border-light" @click="submitBooking" style="margin-top:30px; margin-left:75px;">Create Booking</button>
          
          </div>

         </div>
        </div>
     
          <div class="col-md-8  shadow-lg p-3 mb-5 bg-white rounded" style="position:absolute; left:31%; top:100px; ">
           <h1 style="color:DarkSlateGray; font-weight:normal; font-size:30px;">List of Bookings</h1>
              <table class="table table-striped table-hover">
                   
                <thead class="text-center">
                    <tr>
                        <th class="bg-info">Operator</th>
                        <th class="bg-info">Bus Name</th>
                        <th class="bg-info">Point Of Origin</th>
                        <th class="bg-info">Destination</th>
                        <th class="bg-info">Passenger Name</th>
                      
                       
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="booking in bookings" :key="booking.id" class="w3-hover-light-gray" style="cursor:pointer" @click="openBooking(booking.id)">
                        <td>{{booking.operator}}</td>
                        <td>{{booking.bus_name}}</td>
                        <td>{{booking.point_of_origin}}</td>
                        <td>{{booking.destination}}</td>
                        <td>{{booking.passenger_name}}</td>
                      
                      
                    </tr>
                </tbody>
            </table>
          </div>
      </div>
 
</template>

<script>
export default {
    data() {
        return {
            booking: {
                id:null,
                bus_name:'',
                passenger_name:'',
                address:'',
                contact_no:''
            },

            bookings:[]
        }
    },
    methods: {
        addBooking() {
           
        },
        getData(){
          fetch('http://localhost:8000/api/bookings')
          .then(response=>response.json())
          .then(data=>this.bookings = data)
          .catch(err=>console.log(err) )
        },

         openBooking(bookingId) {
            this.$router.push({
                name: 'view-booking',
                params: {
                    id: bookingId
                }
            })
        },
           
         submitBooking()  {
               fetch('http://localhost:8000/api/bookings', {
                   method: 'post',
                   headers: {
                       "Content-Type":"application/json"
                   },
                   credentials: 'same-origin',
                  body: JSON.stringify(this.booking)

               })
                    .then(res=>res.json())
                    .then(data=>{
                        this.bookings.unshift(data)
                        this.booking = {}
                    })
                    .catch(err=>console.log(err))

         },


    },

    mounted() {
      this.getData();
    },
}


    


</script>

<style>
</style>
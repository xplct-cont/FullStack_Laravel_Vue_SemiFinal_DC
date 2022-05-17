<template>
    <h1>Booked Information</h1>
   
<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 60rem; height:13rem; position:relative;
     left:7%;">  
          <div class="card-header">
                <button class="btn btn-sm bg-danger" style="color:white; position:relative; left: 93.5%;" @click="deleteBooking"> Delete</button>
                    <button class=" btn btn-sm bg-warning" @click="toggleEditor" style= "position:relative; left: -60px;">{{editor.label}}</button>
                      <table class="table table-hover text-center" style="margin-top:20px;">
                            <tr>

                                <th class="bg-info">Operator</th>
                                <th class="bg-info">Bus Name</th>
                                <th class="bg-info">Point Of Origin</th>
                                <th class="bg-info">Destination</th>
                                <th class="bg-info">Passenger Name</th>
                            </tr>
                          
                            <tr>
                                <td>{{booking.operator}}</td>
                                <td>{{booking.bus_name}}</td>
                                <td>{{booking.point_of_origin}}</td>
                                <td>{{booking.destination}}</td>
                                <td>{{booking.passenger_name}}</td>
                            </tr>             
                            
                    </table>
             </div>
            <div>
      
            <div class="card shadow-lg  mb-5 bg-white rounded" style="width:60rem; position:absolute; top:120%; left:0%; ">
             <div v-if="editor.show">
                  <h3 class="text-center bg-info" style="color:dimgray; padding-top:10px; padding-bottom: 10px;">
                      Edit Booking
                  </h3>
                   <hr>
                  <div class="card-body bg-light">
                 <div>
                      <label for="title">&nbsp;&nbsp;Operator &nbsp;</label>
                      <input type="text" v-model="booking.operator"  class="w3-input w3-border" >
                   
                      <label for="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bus Name &nbsp;</label>
                      <input type="text" v-model="booking.bus_name"  class="w3-input w3-border" >
                      
                      <label for="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Point Of Origin &nbsp;</label>
                      <input type="text" v-model="booking.point_of_origin"  class="w3-input w3-border" >
                      <br><br>
                   
                   
                      <label for="title">&nbsp;&nbsp;Destination &nbsp;</label>
                      <input type="text" v-model="booking.destination"  class="w3-input w3-border" >

                      <label for="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Passenger Name &nbsp;</label>
                      <input type="text" v-model="booking.passenger_name"  class="w3-input w3-border" >
                     </div>

                     <button class="btn btn-sm btn-success" style="color:white; position:relative; left: 93%;" @click="saveBooking">Update</button>
                   </div>
                 </div>
          </div>
        </div>
     </div>

</template>

<script>
export default{
    props:['id'],
  
   data(){
       return{
           booking: {},
           editor: {
               show: false,
               label: "Edit Booking"
           }
       }
   },

   methods: {

       toggleEditor(){
           if(this.editor.show){
               this.editor = {show:false, label:"Edit Booking"}
           }else{
                this.editor = {show:true, label:"Cancel"}
           }
       },
       saveBooking(){
                fetch('http://localhost:8000/api/bookings/' + this.booking.id,{
                    method: 'put',
                    headers: {
                        'Content-Type' : "application/json"
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify(this.booking)
                 })
                 .then(res=>res.json())
                 .then(data=>{
                     alert("Booking has been updated")

                 })
                 .catch(err => console.log(err))
       },
          deleteBooking(){
                 fetch('http://localhost:8000/api/bookings/' + this.booking.id,{
                       method:'delete'
                 })
                 .then(res=>res.json())
                 .then(data=>{
                     alert("Booking has been deleted")
                     this.$router.push({
                        name: 'all-bookings'
                     })
                    
                 })
                 .catch(err=>console.log(err))
         }
   },

   mounted(){
       fetch('http://localhost:8000/api/bookings/' + this.id)
       .then(res => res.json())
       .then(data => this.booking = data)
       .then(err => console.log(err))
   }

}

</script>

<style scoped>
 h1{
     color:DarkSlateGray;
     font-weight:normal;
     font-size:35px;
 }

 td{
     color:DarkSlateGray;
 }

</style>
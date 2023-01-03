<template lang="">
    <div class="flex flex-wrap  mb-6 flex-col items-center text-center">
        <router-link to="/comment">
      <button class="flex mx-auto mt-2 mb-2 text-black bg-red-300 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded-full text-lg">Add your thoughts here</button>
        </router-link>

        
      <!-- ----------------------------CATEGORIES MAIN PAGE--------------------------------->
  <!-- <section class="text-gray-600 body-font">
    <div class="container py-24 mx-auto"> -->

    <div  class="flex flex-wrap   ">
      <!------------------------ 1ere categorie----------------------->
        <div v-for="item in categories" class=" xl:w-1/3 md:w-1/2 p-4 w-full">
        <router-link :to="`/global/${item.id}`">
        <div class="flex bg-red-300 hover:bg-red-400 p-6 rounded-lg justify-center items-center">
          <div v-html="item.icon" class="w-10 h-10 inline-flex items-center justify-center  text-gray-900 mb-4">
          
          </div> 
    
          <h2 class="inline-flex ml-1 text-xl text-gray-900 font-medium title-font mb-1">{{item.name}}</h2>
        </div>
      </router-link>
      </div>
      </div>
  </div>
</template>


<script>

export default {
  data() {
    return {
      categories: [],

    }
  },
  methods:{
    getCategories(){
      
      var myHeaders = new Headers();
    myHeaders.append("Accept", "application/json");
    myHeaders.append("Authorization", "Basic cm9vdDo=");

    var requestOptions = {
      method: 'GET',
      headers: myHeaders,
      redirect: 'follow'
    };

    fetch("http://localhost:8000/api/categories", requestOptions)
  .then(response => response.json())
      .then(result =>
        {this.categories = result.data;
          console.log(this.categories.data) })
      .catch(error => console.log('error', error));
  }

  },
  beforeMount(){
    this.getCategories()
  }

};

</script>
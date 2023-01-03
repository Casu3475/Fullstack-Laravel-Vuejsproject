<template lang="">

<div class="flex flex-wrap  mb-6 flex-col items-center text-center">
    <div class="bg-gray-200 w-full">
        <router-link to="/comment">
      <button class=" flex mx-auto mt-2 mb-2 text-black bg-red-300 border-0 py-2 px-8 focus:outline-none hover:bg-red-400 rounded-full text-lg">Add your thoughts here</button></router-link>
    </div>
    <div class="bg-gray-300  pb-10 pl-10 pr-10  w-full">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mt-4 mb-2 text-gray-900 pt-4">{{detailled_categ}}</h1>
    </div>
</div>

<!-- -------------------------------------categories----------------------------------------->
  <section class="text-gray-600 body-font">
    <div class="container py-24 mx-auto">
      <a
        class="mb-10 -mt-6 ml-4 inline-block rounded border border-blue-600 bg-blue-800 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500"
        href="#"
      >
        Order by
      </a>
      <div class="flex flex-wrap ">
        <!-----------------------------------category 1---------------------------------------->
        <div v-for="item in global[0]" class="flex flex-wrap border rounded-lg shadow-sm lg:w-1/4 md:w-1/2 p-4 w-full">
          
          <div  class="block relative h-48 rounded overflow-hidden">
            {{item.title}}
          </div>
          
        </div>
      </div>
    </div>
  </section>

 <!---------------------------------- footer ------------------------------------------>
  <nav class="flex p-2 hidden lg:block flex-auto mb-6 -mt-8 " >
        <ul class="inline-flex -space-x-px  items-center">
          
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-white bg-black ">1</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">2</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">3</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">4</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">5</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">6</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">7</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">8</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">9</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-900 bg-white">10</a>
          </li>
          <li>
            <a href="#" class="py-3 px-5 m-6 leading-tight text-gray-500 bg-white"> > </a>
          </li>
        </ul>
    </nav>


    <div class="grid overflow-hidden grid-cols-5 grid-rows-1 gap-2 lg:hidden">
        <div class="box">
            <a href="#" class="py-3 px-3 m-5 leading-tight text-white bg-black ">1</a>
        </div>
        <div class="box">
            <a href="#" class="py-2 p-10 leading-tight text-gray-900 bg-white">2</a>
        </div>
        <div class="box">
            <a href="#" class="py-2 px-10 leading-tight text-gray-900 bg-white">3</a>
        </div>
        <div class="box">
            <a href="#" class="py-2 px-10 leading-tight text-gray-900 bg-white">4</a>
        </div>
        <div class="box">
            <a href="#" class="py-2 px-8 leading-tight text-gray-500 bg-white"> > </a>
        </div>
    </div>  


</template>


<script>
export default {
  props: ['global'],
  data() {
    return {
      id: this.$route.params.id,
      detailled_categ: '',
    }
  },


  methods: {
    getOneCat() {
      var myHeaders = new Headers();
      myHeaders.append("Authorization", "Basic cm9vdDo=");

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };

      fetch("http://localhost:8000/api/categories/" + this.id, requestOptions)
        .then(response => response.json())
        .then(result => {
         this.detailled_categ = result.data.name;
          console.log(result),
            console.log(detailled_categ);
        })
        .catch(error => console.log('error', error));
    }
  },
  beforeMount() {
    this.getOneCat()
  },
}
</script>

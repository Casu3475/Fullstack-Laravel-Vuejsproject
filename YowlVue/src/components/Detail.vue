<template lang="">


<!-- <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4"> -->
<div class="grid overflow-hidden  lg:grid-cols-2  sm:grid-cols-1  justify-center p-8">
        <!-----------------------------1ère carte detail-------------------------------->
      <div class=" p-4 block relative rounded overflow-hidden ">
        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
          <img class="lg:h-72 md:h-36 w-full object-cover object-center" src="public/inspiration1.jpg" alt="blog">
          <div class="p-6">
            <!-- <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2> -->
            <!-- <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Catalyzer</h1> -->
            <div class=" flex justify-between">
            <h2 class="text-gray-900 title-font text-sm font-medium mb-8">
              {{comment.title}}
            </h2>
            <div class="flex space-x-2">
              <a href="#" class="flex">
                <svg
                  class="w-6 h-6"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
                  ></path>
                </svg>
                <!-- {{comment.likes.length}} -->
              </a>
              <a href="#" class="flex">
                <svg
                  class="w-6 h-6"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                  ></path>
                </svg>
                <!-- {{comment.responses.length}} -->
              </a>
            </div>
            </div>

            <!------------------- commentaire user ---------------------------------->
            <div class="bg-gray-300 rounded-full sm:absolute  ">
              <a href="#" class="absolute"><img src="/public/robot.jpg" class=" h-16 border-shadow rounded-full" alt="user Logo" /></a>
            <p class="ml-16 mb-4 mr-2"><strong>Mr Robot</strong><br> {{ Date(comment.createdAt) }} </p>
           </div>

          <div class=" relative ">
            <p class="mt-16 mb-3"> {{comment.content}}</p>
          </div>
        
          </div>
        </div>
      </div>

      <!------------------------2ème cart detail-------------------------->

      <div class="p-4  ">
        <div class="w-full h-full border-2 border-gray-200 border-opacity-60 rounded-lg ">
          <!-- <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="" alt="blog"> -->
          <div class="p-6">
            <!-- <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>  -->
            <h1 class="title-font text-lg font-medium text-gray-900 mb-3 border-solid border-b-2 border-black">Activity</h1>

            <!-- <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>  -->
            <div v-for="response in comment.responses" class="bg-gray-200 pb-4 pr-4 ">
            <p class="flex ">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                {{ getResponseUserName(response.userId) }} - {{ Date(comment.response) }}
            </p>
            <p class="border border-solid border-gray-400 pl-2  ">
              {{response.content}}
            </p>
            </div>
            <div class="pt-10">
                <a
  class="group relative inline-flex items-center overflow-hidden rounded bg-indigo-800 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
  href="#"
>
  <span
    class="absolute left-0 -translate-x-full transition-transform group-hover:translate-x-4"
  >
    <svg
      class="h-5 w-5"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M17 8l4 4m0 0l-4 4m4-4H3"
      />
    </svg>
  </span>

  <span class="text-sm font-medium transition-all group-hover:ml-4">
    Comment
  </span>
</a>

            </div>
          
          </div>
        </div>
      </div>
      
    <!-- </div>
  </div>
</section> -->
</div>


</template>

<script>
export default {
  data() {
    return {
      id: this.$route.params.id,
      comment: '',    
    }
  },
  methods: {
    getComment(){
      var myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");
      myHeaders.append("Authorization", "Basic cm9vdDo=");

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };

      fetch("http://localhost:8000/api/comments/" + this.id + "?includeResponses=true", requestOptions)
        .then(response => response.json())
        .then(result => {
          console.log(result);
          this.comment = result.data;
        })
        .catch(error => console.log('error', error));
    },
    getResponseUserName(id){
      var myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");

      var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
      };

      fetch("http://localhost:8000/api/users/id", requestOptions)
        .then(response => response.json())
        .then(result => {
          return result.data.name;
        })
        .catch(error => console.log('error', error));
    }
  },
  beforeMount(){
    this.getComment();
    // this.getResponseUserName();
  }
}
</script>

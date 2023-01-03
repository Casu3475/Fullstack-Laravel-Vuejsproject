<template>
    <section class="text-gray-600 body-font ">
    <div class="container py-24 mx-auto ">
      <div class="flex flex-wrap ">
        <!-----------------------------------inspiration 1---------------------------------------->
        <div v-for="comment in search_results" class="lg:w-1/4 md:w-1/2 p-4 w-full border border-gray-700 mx-2 rounded-lg shadow-md">
          <router-link :to="`/detail/${comment.id}`">
            <a class="block relative h-48 rounded overflow-hidden">
              <img
                alt="tokyo"
                class="object-cover object-center w-full h-full block"
                src="public/inspiration1.jpg"
              />
            </a>
          </router-link>

          <div class=" text-xs mt-4 flex justify-between">
            <p class="text-gray-900 title-font text-sm font-medium">
              {{comment.title}}
            </p>
            <div class="flex space-x-2">
              <div class="mt-2">
                {{comment.like_count}}
              </div>
              <a href="#" class=" ">
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
              </a>
              <div class="mt-2">
                {{comment.response_count}}
              </div>
              <a href="#" class=" ">
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
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

export default {
  data() {
    return {
        search: this.$route.params.search,
        search_results: '',
    }
  },
  methods:{
    getSearch(){
        var myHeaders = new Headers();
        myHeaders.append("Accept", "application/json");

        var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
        };

        fetch("http://localhost:8000/api/search/" + this.search, requestOptions)
        .then(response => response.json())
        .then(result => {
            this.search_results = result.data;
            console.log(this.search_results);
        })
        .catch(error => console.log('error', error));
    },
  },
  beforeMount(){
    this.getSearch();
  }

};

</script>

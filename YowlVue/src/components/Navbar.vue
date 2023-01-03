<script>
</script>

<template>
  <nav
    class="grid overflow-hidden  lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 grid-rows-1 gap-8 ml-auto text-sm font-medium items-center bg-blue-800 px-2 sm:px-4 py-1 justify-items-center flex-wrap ">

    <!------------------------------- avatar utilisateur -------------------------------------->
    <div class="box space-x-6 space-y-6 inline-flex">
      <router-link to="/">
        <!-- <a href="" class="grid-col-1 items-center p-5">
          <img src="/public/logo.jpeg" class=" rounded-full" alt="Yowl Logo" />
        </a> -->
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl text-white">TrustMe</span>
    </a>
      </router-link>


      <!---------------------------------- ADMIN ------------------------------------->
      <!-- <div class="box hidden sm:block "> -->
      <!-- <router-link to="/admin">
        <a href="">
          <button type="button"
            class="text-white bg-black mt-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="mr-2 -ml-1 w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
            ADMIN
          </button>
        </a>
      </router-link> -->

    </div>

    <!------------------------------------- search bar -------------------------------------------->
    <div class="box">
      
      <form class="flex items-center">
        <label for="simple-search" class="sr-only">Search a post</label>
        <div class="relative w-full">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
              viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                clip-rule="evenodd"></path>
            </svg>
          </div>
          <input type="text" name="q" id="simple-search"
            v-model="search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search" required />
        </div>
        <router-link :to="`/search/${search}`">
        <button
          class="p-2.5 ml-2 text-sm font-medium text-dark bg-white rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
          <span class="sr-only">Search a post...</span>
        </button>
      </router-link>
      </form>
    </div>

    <div class="box">
      <router-link to="/admin">
        <a href="">
          <button type="button"
            class="text-white bg-black mt-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="mr-2 -ml-1 w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>
            ADMIN
          </button>
        </a>
      </router-link>
    </div>

    <!--------------------------------------- SIGN IN ---------------------------------------------->
    <div class="box space-x-6 pl-8  sm:pb-1 inline-flex mb-3">
          <router-link to="/login">
            <button v-if="there_is_token" type="button"
            class="text-black mt-6 bg-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="white" class="mr-2 -ml-1 w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>
              <p class="text-white">Login</p>
            </button>
          </router-link>

      <!-- </div> -->


      <!-------------------------------------------SIGN UP --------------------------------------------->
      <!-- <div class="box hidden sm:block mr-4"> -->
      <!-- <div class="grid-col-5 ml-auto "> -->
      <router-link to="/register">
        <button v-if="there_is_token" type="button"
          class="text-black mt-6 bg-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-12">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="white" class="mr-2 -ml-1 w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>

          <p class="text-white">Sign Up</p>
        </button>
      </router-link>

          <!------------------------------- avatar utilisateur -------------------------------------->
    <div class="box space-x-6 space-y-6 inline-flex">
      <router-link to="/settings">
        <a v-if="!there_is_token" href="" class="grid-col-1 items-center p-5">
          <img src="/public/avatar.jpg" class="h-12 rounded-full" alt="Yowl Logo" />
        </a>
      </router-link>
      </div>


      <router-link to="/">
        <button v-if="!there_is_token" @click="logout()" type="button"
          class="text-black mt-6 bg-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-12">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="white" class="mr-2 -ml-1 w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>

          <p class="text-white">Logout</p>
        </button>
      </router-link>
    </div>


  </nav>
</template>

<script>
export default {
  data() {
    return {
      there_is_token: '',
      search: this.search,
    }
  },
  methods: {
    is_there_token(){
      if(localStorage.getItem('token') === null){
        this.there_is_token = true;
      }else{
        this.there_is_token = false;
      }
    },
    logout(){
      localStorage.removeItem('token');
      swal("Bye bye! You have logged out of the matrix");
      setTimeout(() => { document.location.reload(); }, 1000);
    }
  },
  beforeMount() {
    this.is_there_token();
  },
}
</script>

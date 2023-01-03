<script setup>
import { ref } from "vue"

import UserPersonalDataEditForm from '../components/UserPersonalDataEditForm.vue'
import YourCommentsDisplay from '../components/YourCommentsDisplay.vue'


</script>

<template lang="">

    <div class="grid overflow-hidden grid-cols-8 grid-rows-1 gap-y-2.5 bg-country">
        <div class="box col-start-1 col-end-2">
          
     <!-- SIDE MENU -->
          <div>
            <div class="flex h-screen flex-col justify-between border-r bg-white">
              <div class="px-4 py-6">

                <nav aria-label="Main Nav" class="mt-6 flex flex-col space-y-1">


                  <!-- PERSONAL DATA MODIFICATION -->
                  <a
                    href="#"
                    @click="false_constants(); personalDataEdit=true"
                    class="flex cursor-pointer items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                  >
                 

                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 opacity-75"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                      />
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Personal Data </span>
                  </a>


                  <!-- Your comments -->
                  <a
                    href="#"
                    @click="false_constants(); yourComments=true"
                    class="flex cursor-pointer items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                  >
                 
              


                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-5 w-5 opacity-75"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"
                      />
                    </svg>

                    <span class="ml-3 text-sm font-medium"> Your Comments </span>
                  </a>




                  


                </nav>
              </div>
            </div>
            </div>














        </div>
        <div class="box col-start-2 col-end-9">
          <div class="font-bold text-center text-5xl mt-[45px] mb-[55px]">
            User Settings
          </div>
          <div v-if="personalDataEdit" class="">
           <UserPersonalDataEditForm /> 
          </div>
          <div v-if="yourComments" class="">
           <YourCommentsDisplay /> 
          </div>
          
        </div>
    </div>



</template>

<script>
export default {
  data() {
    return {
      personalDataEdit: false,
      yourComments: false,
     
    }
  },
  methods: {
    false_constants(){
      this.personalDataEdit = false;
      this.yourComments = false;
      
    }
  },
};
</script>

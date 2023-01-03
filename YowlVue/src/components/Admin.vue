<script setup>
import { ref } from "vue"

import AdminAddCategoryForm from '../components/AdminAddCategoryForm.vue'
import AdminRemoveCategoryForm from '../components/AdminRemoveCategoryForm.vue'
import AdminDisplayCategoryTable from '../components/AdminDisplayCategoryTable.vue'
import AdminEditCategoryForm from '../components/AdminEditCategoryForm.vue'
import AdminRemoveCommentForm from '../components/AdminRemoveCommentForm.vue'
import AdminDisplayCommentForm from '../components/AdminDisplayCommentForm.vue'
import AdminEditUserForm from '../components/AdminEditUserForm.vue'
import AdminRemoveUserForm from '../components/AdminRemoveUserForm.vue'
import AdminDisplayUserForm from '../components/AdminDisplayUserForm.vue'
import AdminRemoveResponseForm from '../components/AdminRemoveResponseForm.vue'
import AdminDisplayResponseForm from '../components/AdminDisplayResponseForm.vue'
import KPIdashboard from '../components/KPIdashboard.vue'

</script>

<template lang="">

    <div class="grid overflow-hidden grid-cols-8 grid-rows-1 gap-y-2.5 bg-country">
        <div class="box col-start-1 col-end-2">
          
     <!-- SIDE MENU -->
          <div>
            <div class="flex h-screen flex-col justify-between border-r bg-white">
              <div class="px-4 py-6">

                <nav aria-label="Main Nav" class="mt-6 flex flex-col space-y-1">
                  

                  <!-- CATEGORIES -->
                  <details class="group">
                    <summary
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
                          d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                        />
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M6 6h.008v.008H6V6z"
                        />
                      </svg>

                      <span class="ml-3 text-sm font-medium"> Categories </span>

                      <span
                        class="ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </span>
                    </summary>

                    <nav aria-label="Teams Nav" class="mt-1.5 ml-8 flex flex-col">
                      <a
                        href="#"
                        @click="false_constants(); AddCategory=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>
                        

                        <span class="ml-3 text-sm font-medium"> Add </span>
                      </a>

                      <a
                        href="#"
                        @click="false_constants(); RemoveCategory=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Remove </span>
                      </a>
                      


                      <a
                        href="#"
                        @click="false_constants(); EditCategory=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Edit </span>
                      </a>

                      <a
                        href="#"
                        @click="false_constants(); DisplayCategory=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> View </span>
                      </a>
                    </nav>
                  </details>



                  <!-- COMMENTS -->
                  <details class="group">
                    <summary
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

                      <span class="ml-3 text-sm font-medium"> Comments </span>

                      <span
                        class="ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </span>
                    </summary>

                    <nav aria-label="Teams Nav" class="mt-1.5 ml-8 flex flex-col">
                      <a
                        href="#"
                        @click="false_constants(); RemoveComment=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Remove </span>
                      </a>

                      <a
                        href="#"
                        @click="false_constants(); DisplayComment=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> View </span>
                      </a>
                    </nav>
                  </details>



                  <!-- USERS -->
                  <details class="group">
                    <summary
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
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                      </svg>

                      <span class="ml-3 text-sm font-medium"> Users </span>

                      <span
                        class="ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </span>
                    </summary>

                    <nav aria-label="Teams Nav" class="mt-1.5 ml-8 flex flex-col">
                      

                      <a
                        href="#"
                        @click="false_constants(); RemoveUser=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Remove </span>
                      </a>
                      


                      <a
                        href="#"
                        @click="false_constants(); EditUser=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Edit </span>
                      </a>

                      <a
                        href="#"
                        @click="false_constants(); DisplayUser=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> View </span>
                      </a>
                    </nav>
                  </details>



                  <!-- Responses -->
                  <details class="group">
                    <summary
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
                          d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"
                        />
                      </svg>

                      <span class="ml-3 text-sm font-medium"> Responses </span>

                      <span
                        class="ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                          />
                        </svg>
                      </span>
                    </summary>

                    <nav aria-label="Teams Nav" class="mt-1.5 ml-8 flex flex-col">
                      <a
                        href="#"
                        @click="false_constants(); RemoveResponse=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> Remove </span>
                      </a>

                      <a
                        href="#"
                        @click="false_constants(); DisplayResponse=true"
                        class="flex items-center rounded-lg px-4 py-2 text-gray-500 hover:bg-gray-100 hover:text-gray-700"
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
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                          />
                        </svg>

                        <span class="ml-3 text-sm font-medium"> View </span>
                      </a>
                    </nav>
                  </details>


                  <!-- KPIs -->
                  <a
                    href="#"
                    @click="false_constants(); KPI=true"
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
                        d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                      />
                    </svg>

                    <span class="ml-3 text-sm font-medium"> KPIs </span>
                  </a>




                  


                </nav>
              </div>
            </div>
            </div>














        </div>
        <div class="box col-start-2 col-end-9">
          <div class="font-bold text-center text-5xl mt-[45px] mb-[55px]">
            Welcome to the Admin Panel
          </div>
          <div v-if="AddCategory" class="">
           <AdminAddCategoryForm /> 
          </div>
          <div v-if="RemoveCategory" class="">
            <AdminRemoveCategoryForm />
          </div>
          <div v-if="DisplayCategory" class="">
            <AdminDisplayCategoryTable />
          </div>
          <div v-if="EditCategory" class="">
            <AdminEditCategoryForm />
          </div>
          <div v-if="RemoveComment" class="">
            <AdminRemoveCommentForm />
          </div>
          <div v-if="DisplayComment" class="">
            <AdminDisplayCommentForm />
          </div>
          <div v-if="EditUser" class="">
            <AdminEditUserForm />
          </div>
          <div v-if="RemoveUser" class="">
            <AdminRemoveUserForm />
          </div>
          <div v-if="DisplayUser" class="">
            <AdminDisplayUserForm />
          </div>
          <div v-if="RemoveResponse" class="">
            <AdminRemoveResponseForm />
          </div>
          <div v-if="DisplayResponse" class="">
            <AdminDisplayResponseForm />
          </div>
          <div v-if="KPI" class="">
            <KPIdashboard />
          </div>
        </div>
    </div>



</template>

<script>
export default {
  data() {
    return {
      AddCategory: false,
      RemoveCategory: false,
      EditCategory: false,
      DisplayCategory: false,

      RemoveComment: false,
      DisplayComment: false,
      EditUser: false,
      RemoveUser: false,
      DisplayUser: false,

      RemoveResponse: false,
      DisplayResponse: false,

      KPI: false,
    }
  },
  methods: {
    false_constants(){
      this.AddCategory = false;
      this.RemoveCategory = false;
      this.EditCategory = false;
      this.DisplayCategory = false;

      this.RemoveComment = false;
      this.DisplayComment = false;
      this.EditUser = false;
      this.RemoveUser = false;
      this.DisplayUser = false;

      this.RemoveResponse = false;
      this.DisplayResponse = false;

      this.KPI = false;
    }
  },
};
</script>

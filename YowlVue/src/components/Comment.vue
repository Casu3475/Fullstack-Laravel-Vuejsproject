<template lang="">
    <div>
        <section class="text-gray-600 body-font relative">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full">
      <p class="lg:w-2/3 mx-auto leading-relaxed subpixel-antialiased text-xs mb-2">Add a comment</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">

      <div class="flex flex-wrap -m-2 border-solid border-2 border-blue-400 rounded-[16px] ml-14 mr-14 pb-10 pt-10">
        <!-- ---------------------------1er text area --------------------------------->
        <div class="p-2 w-full">
          <div class="relative ">
            <input type="text" placeholder="Write a title..." id="name" name="name" class=" rounded-[16px] w-full bg-blue-200 bg-opacity-50  focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
             <!-- -----------------------2e text area ----------------------------->
        <div class="p-2 w-full">
          <div class="relative   ">
            <textarea id="message" placeholder="Write a content..." name="message" class=" rounded-[16px] w-full bg-blue-200    bg-opacity-50 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-8 transition-colors duration-200 ease-in-out"></textarea>
          </div>
          </div>
          <!-- --------------------------3e text area --------------------------------->
        <div class="p-2 ">
            <div>
          <div class="relative mb-4">
            <label id="" name="" for="message" class="rounded-[16px] text-sm text-gray-600  focus:ring-2 px-3 resize-none bg-blue-100 ">Choose a category</label>
            <select name="" id="" class="pb-1 pr-1">
                <option value="1">movies</option>
                <option value="2">cars</option>
                <option value="2">travel</option>
                <option value="2">sports</option>
                <option value="2">cooking</option>
                <option value="2">books</option>
            </select>
          </div>
          </div>
        </div>

         <!--------------------------le bouton add a comment---------------------------->
        <div class="p-2 w-full mb-6">
            <div class="flex">
          <button class=" mx-auto text-black font-bold bg-blue-400 border-0 py-2 px-8 rounded-full focus:outline-none 0  text-lg">
            ADD</button>
     
        </div>
        </div>
  
      </div>
    </div>
  </div>
</section>
    
    
    </div>


</template>


<script>
export default {}
</script>


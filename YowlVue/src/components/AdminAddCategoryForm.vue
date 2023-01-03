<template>
    <div>
        <!--
  This component uses @tailwindcss/forms

  yarn add @tailwindcss/forms
  npm install @tailwindcss/forms

  plugins: [require('@tailwindcss/forms')]
-->

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg text-center">
    <h1 class="text-2xl font-bold sm:text-3xl">Add a new category
    </h1>

    <p class="mt-4 text-gray-500">
    </p>
  </div>

  <div class="mx-auto mt-8 mb-0 max-w-md space-y-4">
    <div>
      <div class="relative ">
        <input
          type="text"
          v-model="name"
          class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md"
          placeholder="Enter a name"
        />
      </div>
    </div>

    <div>
      <div class="relative">
        <input
          type="text"
          v-model="icon"
          class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md"
          placeholder="Enter an icon (SVG text)"
        />
      </div>
    </div>

    <div class="flex items-center justify-center pt-6">
      

      <button
        type="submit"
        @click="addCategory()"
        class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
      >
        Add category
      </button>
    </div>
  </div>
</div>

    </div>
</template>


<script>
export default {
  data() {
    return {
      name: this.name,
      icon: this.icon,
    }
  },
  methods: {
    addCategory(){
      // console.log("HOLA");
      var myHeaders = new Headers();
      myHeaders.append("Accept", "application/json");
      myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      var urlencoded = new URLSearchParams();
      urlencoded.append("name", this.name);
      urlencoded.append("icon", this.icon);

      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: urlencoded,
        redirect: 'follow'
      };

      fetch("http://localhost:8000/api/categories", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));

    }
  },
}
</script>
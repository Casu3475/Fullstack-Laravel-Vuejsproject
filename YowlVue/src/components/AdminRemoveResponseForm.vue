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
                <h1 class="text-2xl font-bold sm:text-3xl">Remove a response
                </h1>

                <p class="mt-4 text-gray-500">
                </p>
            </div>

            <div class="mx-auto mt-8 mb-0 max-w-md space-y-4">
                <div>
                    <div class="relative ">
                        <div class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md">
                            <select v-model="response_content" class="border border-gray-200 rounded-md w-full ">
                                <option v-for="response in responses">
                                    {{ response.content }}
                                </option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="flex items-center justify-center pt-6">


                    <button type="submit" @click="removeResponse()"
                        class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                        Remove response
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
            responses: '',
            response_content: this.response_content,
            response_id: '',
        }
    },
    methods: {
        getResponses() {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/responses", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    this.responses = result.data;
                    console.log(this.responses);
                })
                .catch(error => console.log('error', error));
        },
        removeResponse() {

            console.log(this.response_content);

            for (let i in this.responses) {
                if (this.responses[i].content === this.response_content) {
                    // console.log(this.categories[i].id);

                    var myHeaders = new Headers();
                    myHeaders.append("Accept", "application/json");
                    myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));

                    var requestOptions = {
                        method: 'DELETE',
                        headers: myHeaders,
                        redirect: 'follow'
                    };

                    fetch("http://localhost:8000/api/responses/" + this.responses[i].id, requestOptions)
                        .then(response => response.text())
                        .then(result => console.log(result))
                        .catch(error => console.log('error', error));

                    setTimeout(() => { document.location.reload(); }, 1000);
                }
            }

        },

    },
    beforeMount() {
        this.getResponses();
    }
}
</script>
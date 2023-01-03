<template lang="">
    <div>
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Edit a category
                </h1>

                <p class="mt-4 text-gray-500">
                </p>
            </div>

            <div class="mx-auto mt-8 mb-0 max-w-md space-y-4">
                <div>
                <div class="relative ">
                    <div class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md">
                        <select v-model="category_name" class="border border-gray-200 rounded-md w-full">
                            <option v-for="category in categories">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
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
                    @click="editCategory()"
                    class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
                >
                    Edit category
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
            categories:'',
            icon: this.icon,
        }
    },
    methods: {
        getCategories(){
            var requestOptions = {
            method: 'GET',
            redirect: 'follow'
            };

            fetch("http://localhost:8000/api/categories", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                this.categories = result.data;
                console.log(this.categories);
            })
            .catch(error => console.log('error', error));
        },
        editCategory(){
            for (let i in this.categories){
            if (this.categories[i].name === this.category_name){
                var myHeaders = new Headers();
                myHeaders.append("Accept", "application/json");
                myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));
                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                var urlencoded = new URLSearchParams();
                urlencoded.append("icon", this.icon);

                var requestOptions = {
                method: 'PATCH',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
                };

                fetch("http://localhost:8000/api/categories/" + this.categories[i].id, requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));

                setTimeout(() => { document.location.reload(); }, 1000);
            }
        }
        }
    },
    beforeMount(){
        this.getCategories();
    }
}
</script>

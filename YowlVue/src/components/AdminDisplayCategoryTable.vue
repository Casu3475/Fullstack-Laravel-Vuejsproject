<template lang="">
    <div>
        <div>
            <table class="mx-5 my-9 border border-blue-800">
                <thead class="bg-blue-800">
                    <tr class="grid grid-cols-10 text-center text-white">
                        <th class=" col-span-1">ID</th>
                        <th class="col-span-2">Name</th>
                        <th class="truncate col-span-5">Icon</th>
                        <th  class=" col-span-1">Created At</th>
                        <th  class=" col-span-1">Modified At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="category in categories"  class="grid grid-cols-10 text-center ">
                        <td class="col-span-1 border-r-2 border-blue-200">{{category.id}}</td>
                        <td class="col-span-2 border-r-2 border-blue-200">{{category.name}}</td>
                        <td class="truncate col-span-5 border-r-2 border-blue-200">{{category.icon}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{category.createdAt}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{category.updatedAt}}</td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            categories: '',
        }
    },
    methods: {
        getCategories() {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/categories", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    this.categories = result.data;
                })
                .catch(error => console.log('error', error));
        }
    },
    beforeMount() {
        this.getCategories();
    }
}
</script>

<template lang="">
    <div>
        <div>
            <table class="mx-5 my-9 border border-blue-800">
                <thead class="bg-blue-800">
                    <tr class="grid grid-cols-10 text-center text-white">
                        <th class=" col-span-1">ID</th>
                        <th class="col-span-5">Content</th>
                        <th class="truncate col-span-1">User_id</th>
                        <th class="truncate col-span-1">Comment_id</th>
                        <th  class=" col-span-1">Created At</th>
                        <th  class=" col-span-1">Modified At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="response in responses"  class="grid grid-cols-10 text-center">
                        <td class="col-span-1 border-r-2 border-blue-200">{{response.id}}</td>
                        <td class="col-span-5 border-r-2 border-blue-200">{{response.content}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{response.userId}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{response.commentId}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{response.createdAt}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{response.updatedAt}}</td>
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
            responses: '',
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
                })
                .catch(error => console.log('error', error));
        }
    },
    beforeMount() {
        this.getResponses();
    }
}
</script>

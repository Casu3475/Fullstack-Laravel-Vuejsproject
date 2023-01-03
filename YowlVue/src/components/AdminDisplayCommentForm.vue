<template lang="">
    <div>
        <div>
            <table class="mx-5 my-9 border border-blue-800">
                <thead class="bg-blue-800">
                    <tr class="grid grid-cols-10 text-center text-white">
                        <th class=" col-span-1">ID</th>
                        <th class="col-span-1">Title</th>
                        <th class="truncate col-span-2">Content</th>
                        <th class="truncate col-span-2">Url</th>
                        <th class="truncate col-span-1">User_id</th>
                        <th class="truncate col-span-1">Category_id</th>
                        <th  class=" col-span-1">Created At</th>
                        <th  class=" col-span-1">Modified At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="comment in comments"  class="grid grid-cols-10 text-center">
                        <td class="col-span-1 border-r-2 border-blue-200">{{comment.id}}</td>
                        <td class="col-span-1 border-r-2 border-blue-200">{{comment.title}}</td>
                        <td class="truncate col-span-2 border-r-2 border-blue-200">{{comment.content}}</td>
                        <td class="truncate col-span-2 border-r-2 border-blue-200">{{comment.url}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{comment.userId}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{comment.categoryId}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{comment.createdAt}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{comment.updatedAt}}</td>
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
            comments: '',
        }
    },
    methods: {
        getComments() {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/comments", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    this.comments = result.data;
                })
                .catch(error => console.log('error', error));
        }
    },
    beforeMount() {
        this.getComments();
    }
}
</script>

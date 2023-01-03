<template lang="">
    <div>
        <div>
            <table class="mx-5 my-9 border border-blue-800">
                <thead class="bg-blue-800">
                    <tr class="grid grid-cols-10 text-center text-white">
                        <th class=" col-span-1">ID</th>
                        <th class="col-span-1">Name</th>
                        <th class="truncate col-span-2">Email</th>
                        <th class="truncate col-span-1">Email verified at</th>
                        <th class="truncate col-span-1">Password</th>
                        <th class="truncate col-span-1">Birthday</th>
                        <th class="truncate col-span-1">Admin</th>
                        <th  class=" col-span-1">Created At</th>
                        <th  class=" col-span-1">Modified At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users"  class="grid grid-cols-10 text-center">
                        <td class="col-span-1 border-r-2 border-blue-200">{{user.id}}</td>
                        <td class="col-span-1 border-r-2 border-blue-200">{{user.name}}</td>
                        <td class="truncate col-span-2 border-r-2 border-blue-200">{{user.email}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{user.emailVerifiedAt}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{user.password}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{user.dateOfBirth}}</td>
                        <td class="truncate col-span-1 border-r-2 border-blue-200">{{user.isAdmin}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{user.createdAt}}</td>
                        <td  class=" col-span-1 border-r-2 border-blue-200">{{user.updatedAt}}</td>
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
            users: '',
        }
    },
    methods: {
        getUsers() {
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/users", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    this.users = result.data;
                })
                .catch(error => console.log('error', error));
        }
    },
    beforeMount() {
        this.getUsers();
    }
}
</script>

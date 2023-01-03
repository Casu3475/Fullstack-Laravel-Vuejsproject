<template lang="">
    <div>
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Give admin rights to any user
                </h1>

                <p class="mt-4 text-gray-500">
                </p>
            </div>

            <div class="mx-auto mt-8 mb-0 max-w-md space-y-4">
                <div>
                <div class="relative ">
                    <div class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md">
                        <select v-model="user_name" class="border border-gray-200 rounded-md w-full">
                            <option v-for="user in users">
                                {{ user.name }}
                            </option>
                        </select>
                    </div>
                </div>
                </div>

                <div class="flex items-center justify-center pt-6">
                

                <button
                    type="submit"
                    @click="editUser()"
                    class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
                >
                    Give admin rights
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
            users:'',
        }
    },
    methods: {
        getUsers(){
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
                this.users = result.data;
            })
            .catch(error => console.log('error', error));
        },
        editUser(){
            for (let i in this.users){
            if (this.users[i].name === this.user_name){
                var myHeaders = new Headers();
                myHeaders.append("Accept", "application/json");
                myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));
                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                var urlencoded = new URLSearchParams();
                urlencoded.append("is_admin", 1);

                var requestOptions = {
                method: 'PATCH',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
                };

                fetch("http://localhost:8000/api/users/" + this.users[i].id, requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));

                setTimeout(() => { document.location.reload(); }, 1000);
            }
        }
        }
    },
    beforeMount(){
        this.getUsers();
    }
}
</script>

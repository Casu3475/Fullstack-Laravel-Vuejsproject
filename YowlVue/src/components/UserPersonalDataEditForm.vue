<template lang="">
    <div>
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Edit your personal data
                </h1>

                <p class="mt-4 text-gray-500">
                </p>
            </div>

            <div class="mx-auto mt-8 mb-0 max-w-md space-y-4">

                <div>
                    <div class="relative">
                        <input
                        type="text"
                        v-model="name"
                        class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md"
                        placeholder="Enter a new name"
                        />
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <input
                        type="email"
                        v-model="email"
                        class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md"
                        placeholder="Enter a new email"
                        />
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <input
                        type="password"
                        v-model="password"
                        class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md"
                        placeholder="Enter a new password"
                        />
                    </div>
                </div>

                <div>
                    <div class="relative">
                        <input
                        type="password"
                        v-model="password_confirmation"
                        class="w-full rounded-lg border border-gray-300 p-4 pr-12 text-sm shadow-md"
                        placeholder="Enter password confirmation"
                        />
                    </div>
                </div>


                <div class="flex items-center justify-center pt-6">
                

                <button
                    type="submit"
                    @click="editUserData()"
                    class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
                >
                    Edit my data
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
            user_id: '',
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.password_confirmation,
        }
    },
    methods: {
        user_id_from_token(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch("http://localhost:8000/api/id_from_token/" + localStorage.getItem('token'), requestOptions)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                this.user_id = result.tokenable_id;
                // console.log(this.user_id);

            })
            .catch(error => console.log('error', error));
        },
        editUserData(){
            if (this.password != this.password_confirmation){
                swal({
                    title:"Password and password confirmation do not match.",
                    icon:'warning',
                });
            }
            else {
                var myHeaders = new Headers();
                myHeaders.append("Accept", "application/json");
                myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));
                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                var urlencoded = new URLSearchParams();
                urlencoded.append("name", this.name);
                urlencoded.append("email", this.email);
                urlencoded.append("password", this.password);

                var requestOptions = {
                method: 'PATCH',
                headers: myHeaders,
                body: urlencoded,
                redirect: 'follow'
                };

                fetch("http://localhost:8000/api/users/" + this.user_id, requestOptions)
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
            }

            
        }
    },
    beforeMount(){
        this.user_id_from_token();
    }
}
</script>

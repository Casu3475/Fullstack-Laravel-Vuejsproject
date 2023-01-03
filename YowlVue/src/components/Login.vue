<template lang="">
    <div>
        <section class="relative flex flex-wrap lg:h-screen lg:items-center">
            <div class="w-full px-4 py-6 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-12">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Log In!</h1>
        
                <p class="mt-4 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et libero nulla
                eaque error neque ipsa culpa autem, at itaque nostrum!
                </p>
            </div>
        
            <div class="mx-auto mt-8 mb-0 max-w-md space-y-4">
                <div>
                <label for="email" class="sr-only">Email</label>
        
                <div class="relative">
                    <input
                    type="email"
                    v-model="email"
                    class="w-full rounded-lg bg-gray-100 border border-gray-300 p-4 pr-12 text-sm shadow-sm"
                    placeholder="Enter email"
                    />
        
                    <span class="absolute inset-y-0 right-4 inline-flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                        />
                    </svg>
                    </span>
                </div>
                </div>
        
                <div>
                <label for="password" class="sr-only">Password</label>
                <div class="relative">
                    <input
                    type="password"
                    v-model="password"
                    class="w-full rounded-lg bg-gray-100 border border-gray-300 p-4 pr-12 text-sm shadow-sm"
                    placeholder="Enter password"
                    />
        
                    <span class="absolute inset-y-0 right-4 inline-flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                    </svg>
                    </span>
                </div>
                </div>
        
                <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">
                    No account?
                    <a href="#" class="underline">Sign up</a>
                </p>
        
                <button
                    type="submit"
                    @click="login()"
                    class="ml-3 inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
                >
                    Sign in
                </button>
                </div>
            </div>
            </div>
        
            <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2 ">
            <img
                alt="Welcome"
                src="public/books.jpeg"
                class="absolute inset-0 h-full w-full object-cover"
            />
            </div>
        </section>
    </div>
</template>


<script>
export default {
    data() {
        return {       
            email: this.email,
            password: this.password,
            response_200: ''
        }
    },
    methods: {
        login(){
            
            

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

            var urlencoded = new URLSearchParams();
            urlencoded.append("email", this.email);
            urlencoded.append("password", this.password);

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
            redirect: 'follow'
            };

            
            fetch("http://localhost:8000/api/login", requestOptions)
            .then(response => {
                if(response.status == 200){
                    this.response_200 = 200;
                    console.log("OUI");
                    console.log(this.response_200);
                } else{
                    console.log("NON");
                }
                return response.json();
            })
            // .then(response => {
            //     if(response.status == 200){
            //         this.response_200 = 200;
            //         console.log("OUI");
            //         console.log(this.response_200);
            //     } else{
            //         console.log("NON");
            //     }
            // })
            .then(result => {
                console.log(result);
                console.log(typeof response_200)
                if (this.response_200 == 200) {
                    console.log('HELLO');
                    
                    console.log(result);
                    localStorage.setItem('token',result.data.token);
                    swal({
                        title:"Welcome to the matrix",
                        icon:'success',
                    });
                    this.$router.push('/');
                    setTimeout(() => { document.location.reload(); }, 1000);
                    
                }
                else {
                    swal({
                        title:"Connexion failed",
                        icon:'warning',
                    });
                }
                

            })
            .catch(error => console.log('error', error));

            
            
            
            
            
            // vm.$forceUpdate();
            //or in file components
            // this.$forceUpdate();
        }
    },
}
</script>

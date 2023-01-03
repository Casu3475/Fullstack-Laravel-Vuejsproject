<template lang="">
    <div>
        <div class="grid overflow-hidden grid-cols-4 grid-rows-2 gap-x-2 gap-y-2 mx-4 my-8">
            <!-- Categories with most comments -->
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl">Categories with most comments</div>
                <div class="my-5 pb-8 mx-8 bg-green-100 border border-gray-500 shadow-md rounded-lg">
                    <div v-for="category in comments_by_category" class="flex items-center justify-center mt-3">
                        <div class="grid items-center justify-center mt-5 text-lg">{{category.name}}:</div>
                        <div class="grid items-center justify-center mt-5 text-lg ml-4">{{category.count}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- Most liked categories -->
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl">Most liked categories</div>
                <div class="my-5 pb-8 mx-8 bg-blue-100 border border-gray-500 shadow-md rounded-lg">
                    <div v-for="category in most_liked_categories" class="flex items-center justify-center mt-3">
                        <div class="grid items-center justify-center mt-5 text-lg">{{category.name}}:</div>
                        <div class="grid items-center justify-center mt-5 text-lg ml-4">{{category.likes_count}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                     </div>
                </div>
            </div>
            <!-- Most liked users -->
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl">Most liked users</div>
                <div class="my-5 pb-8 mx-8 bg-blue-100 border border-gray-500 shadow-md rounded-lg">
                    <div v-for="user in most_liked_users" class="flex items-center justify-center mt-3">
                        <div class="grid items-center justify-center mt-5 text-lg">{{user.name}}:</div>
                        <div class="grid items-center justify-center mt-5 text-lg ml-4">{{user.likes_count}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                     </div>
                </div>
            </div>
            <!-- Most liked comments -->
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl">Most liked comments</div>
                <div class="my-5 pb-8 mx-8 bg-blue-100 border border-gray-500 shadow-md rounded-lg">
                    <div v-for="comment in most_liked_comments" class="flex items-center justify-center mt-3">
                        <div class="grid items-center justify-center mt-5 text-lg">{{comment.title}}:</div>
                        <div class="grid items-center justify-center mt-5 text-lg ml-4">{{comment.likes_count}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                        </svg>
                     </div>
                </div>
            </div>
            <!-- Most reported users -->
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl">Most reported users</div>
                <div class="my-5 pb-8 mx-8 bg-red-100 border border-gray-500 shadow-md rounded-lg">
                    <div v-for="user in most_reported_users" class="flex items-center justify-center mt-3">
                        <div class="grid items-center justify-center mt-5 text-lg">{{user.name}}:</div>
                        <div class="grid items-center justify-center mt-5 text-lg ml-4">{{user.reports_count}}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2 mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                        </svg>
                       

                     </div>
                </div>
            </div>
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl">Total accounts</div>
                <div class="grid items-center justify-center mt-5 text-2xl ml-4">{{total_accounts}}</div>
            </div>
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl"># Accounts created in last 24h</div>
                <div class="grid items-center justify-center mt-5 text-2xl ml-4">{{sum_creations}}</div>
                
            </div>
            <div class="box border border-gray-200 rounded-lg shadow-md bg-gray-100">
                <div class="grid items-center justify-center mt-5 text-2xl"># Accounts deleted in last 24h</div>
                <div class="grid items-center justify-center mt-5 text-2xl ml-4">{{sum_closures}}</div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    data() {
        return {
            comments_by_category: '',
            sum_closures: '',
            sum_creations: '',
            total_accounts: '',
            most_liked_categories: '',
            most_liked_users: '',
            most_liked_comments: '',
            most_reported_users: '',
        }
    },
    methods: {
        comments_per_categ() {
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Basic cm9vdDo=");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/comments_per_category", requestOptions)
                .then(response => response.json())
                .then(result => {
                    // console.log(result[0].name);
                    this.comments_by_category = result;
                    // console.log(this.comments_by_category[0].name);
                })
                .catch(error => console.log('error', error));
        },

        closures() {
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Basic cm9vdDo=");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/closures24h", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result[0].total_account_closed_the_last_24h);
                    this.sum_closures = result[0].total_account_closed_the_last_24h;
                })
                .catch(error => console.log('error', error));
        },

        creations() {
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Basic cm9vdDo=");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/creations24h", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result[0].total_account_created_the_last_24h);
                    this.sum_creations = result[0].total_account_created_the_last_24h;
                })
                .catch(error => console.log('error', error));
        },

        total_account(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Basic cm9vdDo=");

            var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
            };

            fetch("http://localhost:8000/api/total_account", requestOptions)
                .then(response => response.json())
                .then(result => {
                    console.log(result[0].total_account);
                    this.total_accounts = result[0].total_account;
                })
                .catch(error => console.log('error', error));
        },
        
        getMostLikedCategories(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch("http://localhost:8000/api/most_liked_categories/3", requestOptions)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                this.most_liked_categories = result;
                // console.log(this.most_liked_categories[0].name);
            })
            .catch(error => console.log('error', error));
        },

        getMostLikedUsers(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Bearer " + localStorage.getItem('token'));

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch("http://localhost:8000/api/most_liked_users/3", requestOptions)
            .then(response => response.json())
            .then(result => {
                this.most_liked_users = result;
            })
            .catch(error => console.log('error', error));
        },

        getMostLikedComments(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Basic cm9vdDo=");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch("http://localhost:8000/api/most_liked_comments/3", requestOptions)
            .then(response => response.json())
            .then(result => {
                this.most_liked_comments = result;
                console.log(this.most_liked_comments);
            })
            .catch(error => console.log('error', error));
        },
        
        getMostReportedUsers(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");
            myHeaders.append("Authorization", "Basic cm9vdDo=");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch("http://localhost:8000/api/most_reported_users/3", requestOptions)
            .then(response => response.json())
            .then(result => {
                this.most_reported_users = result;
                console.log(this.most_reported_users);
            })
            .catch(error => console.log('error', error));
        },
    },
    beforeMount() {
        this.closures();
        this.creations();
        this.total_account();
        this.comments_per_categ();
        this.getMostLikedCategories();
        this.getMostLikedUsers();
        this.getMostLikedComments();
        this.getMostReportedUsers();
    }
}
</script>

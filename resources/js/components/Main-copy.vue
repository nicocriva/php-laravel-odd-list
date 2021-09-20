<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-4" v-for="post in posts" :key="post.id">
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="card-title mb-1">{{post.title}}</h4>
                        <div class="card-text text-muted mb-2">{{data(post.created_at)}}</div>
                        <p class="card-text">{{cut(post.content, 180)}}</p>
                        <a href="#" class="btn btn-primary">Show More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item" :class="{'disabled' : currentPage == 1}">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true" @click="getPosts(currentPage - 1)">Previous</a>
                    </li>
                    <li class="page-item" :class="{'active' : currentPage == page}" v-for="page in lastPage" :key="page">
                        <a class="page-link" href="#" @click="getPosts(page)">{{ page }}</a>
                    </li>
                    <li class="page-item" :class="(currentPage == lastPage) ? 'disabled' : ''">
                        <a class="page-link" href="#" @click="getPosts(currentPage + 1)">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template> 

<script>
export default {
    name: "Main",
    data() {
        return{
            urlApi: 'http://localhost:8000/api/posts',
            posts: [],
            currentPage: 1,
            lastPage: []
        }
    },
    created(){
        this.getPosts(this.currentPage);
    },
    methods: {
        getPosts(pagePost){
            axios.get(this.urlApi, {
                params: {
                    page: pagePost
                }
            })
                 .then(response => {
                     this.posts = response.data.results.data;
                    //  console.log(this.posts);
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;
                 })
                 .catch()
        },
        cut(text, maxText){
            if(text.length > maxText){
                return text.substr(0, maxText) + '...';
            }
            return text;
        },
        data(x){
            const postData = new Date(x);
            let day = postData.getDate();
            let month = parseInt(postData.getMonth() + 1);
            if(day < 10){
                day = '0' + day;
            }
            if(month < 10){
                month = '0' + month;
            }
            return postData.getDate() + '/' + month + '/' + postData.getFullYear();
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
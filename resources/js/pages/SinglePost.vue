<template>
    <div class="container my-4">
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title"> {{post.title}} </h5>
                <p class="card-text mb-1"> {{post.content}} </p>
                <div class="card-text"> Category: {{post.category.name}} </div>
                <div v-if="post.tags.length">
                    <span class="badge badge-success m-1" v-for="(tag,index) in post.tags" :key="index">
                        {{tag.name}}
                    </span>
                </div>
                <router-link class="btn btn-primary" :to="{name: 'post'}">
                    Back
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: []
        }
    },
    mounted(){
        axios.get('/api/post/'+ this.$route.params.slug)
             .then( response => {
                 this.post = response.data.results;
                 console.log(this.post);
             })
             .catch(error => {
                 console.log(error);
             });
    }
}
</script>

<style lang="scss" scoped>

</style>
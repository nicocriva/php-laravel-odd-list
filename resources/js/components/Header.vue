<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link :to="{name: 'home'}" class="navbar-brand">
                    Boolpress
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item" v-for="(element, index) in menuBoolpress" :key="index">
                            <router-link class="nav-link" :to="{name: element.routeName}">
                                {{element.label}}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header",
    data(){
        return {
            menuBoolpress: [
                {
                    label : 'Home',
                    routeName: 'home'
                },
                {
                    label : 'About',
                    routeName: 'about'
                },
                {
                    label : 'Contact',
                    routeName: 'contact'
                },
                {
                    label : 'Post',
                    routeName: 'post'
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
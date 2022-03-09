<template>

    <div class="container">
        <Header />

        <router-view></router-view>

        <footer>
            <h1>Footer</h1>
        </footer>
    </div>

</template>

<script>
import Header from '../components/Header.vue'

export default {
    name: 'App',
    components: {
        Header
    },
    data: function(){
        return {
            
        }
    }
}
</script>
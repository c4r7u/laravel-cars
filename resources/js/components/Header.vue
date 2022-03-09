<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand" href="#">Navbar</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" v-for="(link, index) in links" :key="index">
                        <router-link class="nav-link active" :to="{name: link.urlName}">{{link.label}}</router-link>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data: function(){
        return {
            links: [
                {
                    urlName : 'home',
                    label: 'Homepage'
                },
                {
                    urlName: 'contact-us',
                    label: 'Contact Us'
                },
                {
                    urlName: 'car-list',
                    label: 'CarList'
                }
            ]
        }
    }
}
</script>
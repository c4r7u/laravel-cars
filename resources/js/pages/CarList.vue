<template>
    <section>
        <h1>Car List</h1>
        
        <!-- Single Card -->
        <div class="row row-cols-3">
            <div v-for="car in cars" :key="car.id" class="col">
                <div class="card mb-3" style="width: 18rem;">
                    <img class="card-img-top" :src="car.thumb" :alt="car.brand + ' ' + car.model">
                    <div class="card-body">
                        <h5 class="card-title">{{ car.brand }}  {{ car.model }}</h5>
                        <a href="#" class="btn btn-primary">Vai al post</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
export default {
    name: 'CarList',
    data: function() {
        return {
            cars: {}
        }
    },
    methods: {
        
        getCars() {
            axios.get('/api/cars')
            .then((response) => {
                this.cars = response.data.response;
            });
        }
    },
    created: function() {
        this.getCars();
    }
}
</script>
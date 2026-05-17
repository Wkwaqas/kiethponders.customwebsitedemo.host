<template>
    <b-row>
        <b-col cols="12" class="mb-1">
            <h3>Project Images</h3>
        </b-col>
        <b-col cols="12">
            <b-carousel
                    id="carousel-example-generic"
                    controls
                    indicators
            >
                <template v-for="(item,index) in images">
                    <b-carousel-slide :key="`images-${index}`" :img-src="`/${guard}/api/attachment/post_images/${item.name}`" />
                </template>
            </b-carousel>
        </b-col>
    </b-row>
</template>

<script>
    import {BRow, BCol, BCarousel, BCarouselSlide} from 'bootstrap-vue';
    export default {
        name: "ProjectImages",
        components:{
            BRow, BCol, BCarousel, BCarouselSlide
        },
        props:{
            images: {
                type: Array,
                required: true
            },
        },
        data(){
            return {
                guard : window.apex.user.auth_guard
            }
        }
    }
</script>

<style scoped>

</style>
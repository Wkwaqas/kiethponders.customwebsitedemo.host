<template>
    <b-row>
        <b-col cols="12" class="mb-1">
            <h3>Project Documents</h3>
        </b-col>
        <b-col cols="12">
            <table class="table">
                <thead class="thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Attachment</th>
                </tr>
                </thead>
                <tbody>
                <template v-for="(item, index) in documents">
                    <tr>
                        <th scope="row">{{(index+1)}}</th>
                        <td>{{item.name}}</td>
                        <td><a :href="`/${guard}/api/attachment/post_document/${item.document}`" target="_blank">View Attachment</a>
                        </td>
                    </tr>
                </template>
                </tbody>
            </table>
        </b-col>
    </b-row>
</template>

<script>
    import {BRow, BCol} from 'bootstrap-vue';

    export default {
        name: "ProjectDocuments",
        components: {
            BRow, BCol
        },
        props: {
            documents: {
                type: Array,
                required: true
            },
        },
        data() {
            return {
                guard: window.apex.user.auth_guard
            }
        }
    }
</script>

<style scoped>

</style>
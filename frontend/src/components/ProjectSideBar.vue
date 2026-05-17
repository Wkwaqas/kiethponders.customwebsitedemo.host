<template>
    <div v-if="model != null" class="d-flex flex-column p-2">
        <b-row>
            <b-col cols="6">
                <h3>{{model ? model.title : ''}}</h3>
                <h4 :style="`color: ${text_color}`">{{calculate_match.toFixed(2)}}% Match</h4>
            </b-col>
            <b-col cols="6">
                <b-button
                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                        type="submit" v-if="showReq == 1"
                        variant="outline-success"
                        class="mr-1 float-right"
                        @click="requestPost()"
                >
                    Request
                </b-button>
            </b-col>
            <b-col cols="12">
                <hr/>
            </b-col>
        </b-row>
        <project-basic-detail :model="model"/>
        <b-row>
            <b-col cols="12">
                <hr/>
            </b-col>
        </b-row>
        <project-images v-if="model && model.images.length > 0"
                        :images="model ? model.images : []"/>
        <b-row>
            <b-col cols="12">
                <hr/>
            </b-col>
        </b-row>
        <project-documents v-if="model && model.documents.length > 0"
                           :documents="model ? model.documents : []"/>
    </div>
</template>

<script>
    import {BRow, BCol, BButton} from 'bootstrap-vue'
    import ProjectBasicDetail from "@/components/ProjectBasicDetail";
    import ProjectImages from "@/components/ProjectImages";
    import ProjectDocuments from "@/components/ProjectDocuments";
    import {post} from "@/libs/api";
    import {form} from "@/libs/mixins";
    export default {
        name: "ProjectSideBar",
        components: {BRow, BCol, BButton, ProjectDocuments, ProjectImages, ProjectBasicDetail},
        props: {
            model : {
                required: true
            },
            showReq : {
                default : 0
            }
        },
        mixins: [form],
        computed:{
            calculate_match(){
                if(this.model != null){
                    var totalMatch = 0;
                    var totalTrades = this.model.trade_categories.length;
                    var countTrades = 0;
                    //Calculate Project Match
                    if(this.project_types.includes(this.model.project_type_id)){
                        totalMatch += 20;
                    }
                    //Calculate Construction Match
                    if(this.construction_types.includes(this.model.construction_type_id)){
                        totalMatch += 20;
                    }
                    //Calculate Trades Match
                    for(var i=0;i<this.model.trade_categories.length;i++){
                        if(this.trade_categories.includes(this.model.trade_categories[i]['trade_category_id'])){
                            countTrades += 1;
                        }
                    }
                    var tradePercent = (countTrades/totalTrades)*60;
                    totalMatch += tradePercent;

                    return totalMatch;
                }else {
                    return 0;
                }
            },
            text_color(){
                var totalMatch = this.calculate_match;
                if(totalMatch > 85){
                    return 'green';
                }else if(totalMatch > 75){
                    return '#c8d641';
                }else if(totalMatch > 65){
                    return 'yellow'
                }else if(totalMatch > 55){
                    return '#f2b620';
                }else if(totalMatch > 45){
                    return 'orange'
                }else{
                    return 'red';
                }
            }
        },
        data(){
            return {
                trade_categories : window.apex.user.trade_categories,
                project_types : window.apex.user.project_types,
                construction_types : window.apex.user.construction_types,
            }
        },
        methods: {
            requestPost() {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-1',
                    },
                    buttonsStyling: false,
                }).then(result => {
                    if (result.value) {
                        this.openLoading()
                        post('/contractor/api/post_bid_request', {post_id: this.model.id}).then(res => {
                            if (res.data.saved) {
                                this.$swal({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Request Submitted Successfully',
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                    },
                                })
                                this.closeLoading()
                                this.$emit('updateRequest');
                            }
                        });
                    }
                })
            },

        }
    }
</script>

<style scoped>

</style>
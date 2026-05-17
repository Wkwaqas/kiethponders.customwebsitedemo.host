<template>
    <b-row>
        <b-col cols="9" class="border-right-dark">
            <b-row>
                <b-col cols="12" class="d-flex flex-column my-1">
                    <label>Address:</label>
                    <span>{{model.address}}</span>
                </b-col>
                <b-col cols="4" class="d-flex flex-column">
                    <label>City:</label>
                    <span>{{model.city ? model.city.title : ''}}</span>
                </b-col>
                <b-col cols="4" class="d-flex flex-column">
                    <label>State:</label>
                    <span>{{model.state ? model.state.title : ''}}</span>
                </b-col>
                <b-col cols="4" class="d-flex flex-column">
                    <label>Zip:</label>
                    <span>{{model.zip_code}}</span>
                </b-col>
            </b-row>
            <hr/>
            <b-row class="d-flex align-items-center">
                <b-col cols="4">
                    <b-card-text>Bidding Duration:</b-card-text>
                </b-col>
                <b-col cols="4" class="d-flex flex-column">
                    <label>From:</label>
                    <span>{{model.bidding_start_date | formatDate}}</span>
                </b-col>
                <b-col cols="4" class="d-flex flex-column">
                    <label>To:</label>
                    <span>{{model.bidding_end_date | formatDate}}</span>
                </b-col>
            </b-row>
            <hr/>
            <b-row class="d-flex align-items-center">
                <b-col cols="2">
                    <b-card-text>Trades:</b-card-text>
                </b-col>
                <b-col cols="10" class="d-flex flex-wrap">
                    <template v-for="(trade,index) in model.trade_categories">
                        <b-badge variant="primary" style="margin: 2.5px !important;">
                            {{trade.trade_category.title}}
                        </b-badge>
                    </template>
                </b-col>
            </b-row>
            <hr/>
            <b-row>
                <b-col cols="6" class="border-right-dark">
                    <b-row class="mb-1">
                        <b-col cols="6" class="d-flex flex-column">
                            <label>Project Stage:</label>
                            <span>{{model.project_stage ? model.project_stage.title : ''}}</span>
                        </b-col>
                        <b-col cols="6" class="d-flex flex-column">
                            <label>Project Use:</label>
                            <span>{{model.project_use ? model.project_use.title : ''}}</span>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="6" class="d-flex flex-column">
                            <label>Project Type:</label>
                            <span>{{model.project_type ? model.project_type.title : ''}}</span>
                        </b-col>
                        <b-col cols="6" class="d-flex flex-column">
                            <label>Construction Type:</label>
                            <span>{{model.construction_type ? model.construction_type.title : ''}}</span>
                        </b-col>
                    </b-row>
                </b-col>
                <b-col cols="6" class="d-flex flex-column">
                    <label>Description:</label>
                    <span>{{model.description}}</span>
                </b-col>
            </b-row>
        </b-col>
        <b-col cols="3" >
            <b-row>
                <b-col cols="12" class="my-1">
                    <h4>Contact Details</h4>
                </b-col>
                <b-col cols="12" class="d-flex flex-column mb-1">
                    <label>Contact Type:</label>
                    <span>{{model.contact_type ? model.contact_type.title : ''}}</span>
                </b-col>
                <b-col cols="12" class="d-flex flex-column mb-1">
                    <label>Contact Name:</label>
                    <span>{{model.contact_first_name}} {{model.contact_last_name}}</span>
                </b-col>
                <b-col cols="12" class="d-flex flex-column mb-1">
                    <label>Contact Role:</label>
                    <span>{{model.contact_role}}</span>
                </b-col>
                <b-col cols="12" class="d-flex flex-column mb-1">
                    <label>Contact Company:</label>
                    <span>{{model.contact_company_name}}</span>
                </b-col>
                <b-col cols="12" class="d-flex flex-column mb-1">
                    <label>Contact Email:</label>
                    <span>{{model.contact_email}}</span>
                </b-col>
                <b-col cols="12" class="d-flex flex-column mb-1">
                    <label>Contact Phone:</label>
                    <span>{{model.contact_phone}}</span>
                </b-col>
            </b-row>
        </b-col>
    </b-row>
</template>

<script>
    import {
        BRow, BCol, BBadge, BCardText
    } from 'bootstrap-vue';
    export default {
        name: "ProjectBasicDetail",
        components : {
            BRow, BCol, BBadge, BCardText
        },
        props:{
            model : {
                type: Object,
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
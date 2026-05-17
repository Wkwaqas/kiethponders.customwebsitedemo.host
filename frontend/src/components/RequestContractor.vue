<template>
    <tr>
        <th scope="row">{{(index+1)}}</th>
        <td>{{item.contractor.business_name}}</td>
        <td>{{item.contractor.business_phone_no}}</td>
        <td :style="`color: ${text_color}`">
            {{calculate_match.toFixed(2)}}%
        </td>
        <td>
            <b-badge class="text-white"
                     :variant="request_status[item.status]['variant']">
                {{ request_status[item.status]['text'] }}
            </b-badge>
        </td>

        <td>
            <template v-if="item.status == 0">
                <feather-icon
                        icon="CheckIcon"
                        class="cursor-pointer text-success"
                        size="16"
                        @click="updateRequests(1)"
                />
                <feather-icon
                        icon="XIcon"
                        class="cursor-pointer text-danger"
                        size="16"
                        @click="updateRequests(2)"
                />
            </template>
            <template v-if="item.status == 3">
                <b-button
                        variant="danger"
                        size="sm"
                        @click="updateRequests(4)"
                >
                    Cancel
                </b-button>
                <b-button
                        class="mx-1"
                        variant="success"
                        size="sm"
                        @click="updateRequests(5)"
                >
                    Approve
                </b-button>
            </template>
            <template v-if="item.status == 5">
                <b-button
                        class="mx-1"
                        variant="success"
                        size="sm"
                        @click="completeRequest(6)"
                >
                    Complete
                </b-button>
            </template>

            <template v-if="item.status == 3 || item.status == 5">
                <feather-icon
                        icon="MessageSquareIcon"
                        class="cursor-pointer mr-1"
                        size="16"
                        @click="openChat()"
                />
            </template>
            <feather-icon
                    icon="EyeIcon"
                    class="cursor-pointer"
                    size="16"
                    @click="viewContractor()"
            />
        </td>
        <b-modal
                v-model="showModal"
                id="modal-prevent-closing"
                title="Leave a Review"
                ok-only
                ok-title="Submit"
                no-close-on-backdrop
                no-close-on-esc
                hide-header-close
                @ok="handleOk">
            <b-row>
                <b-col md="12">
                    <b-form-group
                            label="Rate your experience"
                    >
                        <b-form-rating v-model="form.rating" variant="primary" size="lg" />
                    </b-form-group>
                </b-col>
            </b-row>
        </b-modal>


    </tr>
</template>

<script>
    import {post} from "@/libs/api";
    import {BBadge, BButton, BModal, BRow, BCol, BFormGroup, BFormRating} from "bootstrap-vue";
    import Vue from "vue";

    export default {
        name: "RequestContractor",
        components: {
            BBadge,
            BButton,
            BModal,
            BRow,
            BCol,
            BFormGroup,
            BFormRating
        },
        props: {
            item: {
                type: Object,
                required: true
            },
            index: {
                type: Number,
            },
            request_status: {
                type: Array,
                required: true
            },
            project_type_id: {
                type: Number,
                required: true
            },
            construction_type_id: {
                type: Number,
                required: true
            },
            trades: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                form: {
                    id: this.item.id,
                    status: 6,
                    post_id: this.item.post_id,
                    contractor_id: this.item.contractor_id,
                    rating: 0
                },
                showModal: false,

            }
        },
        methods: {
            viewContractor() {
                window.open(`/contractors/${this.item.contractor.uniq_id}`, '_blank')
            },
            openChat() {
                this.$router.push(`/post_bid_requests/${this.item.id}/chat`)
            },
            completeRequest() {
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
                        Vue.set(this.$data, 'showModal', true)
                    }
                });
            },

            resetModal() {
                Vue.set(this.$data, 'form', {
                    id: this.item.id,
                    status: 6,
                    post_id: this.item.post_id,
                    contractor_id: this.item.contractor_id,
                    rating: 0
                })
            },
            handleOk(bvModalEvt) {
                bvModalEvt.preventDefault()
                this.$emit('showLoading');
                Vue.set(this.$data, 'showModal', false)

                post('/project_owner/api/bid_request/updateStatus', this.form).then(res => {
                    if (res.data.saved) {
                        this.$emit('updateStatus', res.data.data);
                        this.$swal({
                            icon: 'success',
                            title: 'Success!',
                            text: `Project Request ${status == 1 ? 'Accepted' : (status == 2 ? 'Decline' : (status == 4 ? 'Cancel' : (status == 5 ? 'Approve' : 'Completed')))} Successfully`,
                            customClass: {
                                confirmButton: 'btn btn-success',
                            },
                        })
                        this.$emit('closeLoading');
                    }
                });
                this.resetModal()
            },

            updateRequests(status) {
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
                        this.$emit('showLoading');
                        post('/project_owner/api/bid_request/updateStatus', {
                            id: this.item.id,
                            post_id: this.item.post_id,
                            contractor_id: this.item.contractor_id,
                            status: status
                        }).then(res => {
                            if (res.data.saved) {
                                this.$emit('updateStatus', res.data.data);
                                this.$swal({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: `Project Request ${status == 1 ? 'Accepted' : (status == 2 ? 'Decline' : (status == 4 ? 'Cancel' : (status == 5 ? 'Approve' : 'Completed')))} Successfully`,
                                    customClass: {
                                        confirmButton: 'btn btn-success',
                                    },
                                })
                                this.$emit('closeLoading');
                            }
                        });
                    }
                })
            },

        },
        computed: {
            calculate_match() {
                var totalMatch = 0;
                var totalTrades = this.trades.length;
                var countTrades = 0;
                //Calculate Project Match
                for (var i = 0; i < this.item.contractor_project_types.length; i++) {
                    if (this.item.contractor_project_types[i]['project_type_id'] == this.project_type_id) {
                        totalMatch += 20;
                        break;
                    }
                }
                for (var i = 0; i < this.item.contractor_construction_types.length; i++) {
                    if (this.item.contractor_construction_types[i]['construction_type_id'] == this.construction_type_id) {
                        totalMatch += 20;
                        break;
                    }
                }
                //Calculate Trades Match
                for (var i = 0; i < this.item.contractor_trades.length; i++) {
                    for (var j = 0; j < this.trades.length; j++) {
                        if (this.item.contractor_trades[i]['trade_category_id'] == this.trades[j]['trade_category_id']) {
                            countTrades += 1;
                            break;
                        }
                    }
                }

                var tradePercent = (countTrades / totalTrades) * 60;
                totalMatch += tradePercent;

                return totalMatch;
            },
            text_color() {
                var totalMatch = this.calculate_match;
                if (totalMatch > 85) {
                    return 'green';
                } else if (totalMatch > 75) {
                    return '#c8d641';
                } else if (totalMatch > 65) {
                    return 'yellow'
                } else if (totalMatch > 55) {
                    return '#f2b620';
                } else if (totalMatch > 45) {
                    return 'orange'
                } else {
                    return 'red';
                }
            }
        }
    }
</script>

<style scoped>

</style>
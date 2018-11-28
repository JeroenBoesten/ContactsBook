<template>
        <tr>
            <td>
                <div class="row">
                    <div class="col-xs-5 col-sm-4 col-md-2">
                        <img :src="contact.gravatar"
                             :alt="`${contact.first_name} ${contact.last_name}`" class="img-fluid rounded-circle d-block">
                    </div>
                    <div class="col-xs-7 col-sm-8 col-md-10">
                        <h4>{{ contact.first_name }} <b>{{ contact.last_name }}</b></h4>
                        <address class="ml-3">
                            <span v-show="contact.phone_number"><i class="fas fa-phone"></i> {{ contact.phone_number }}<br></span>
                            <span v-show="contact.email"><i class="fas fa-envelope-open"></i> {{ contact.email }}<br></span>
                            <span v-show="contact.twitter"><i class="fab fa-twitter"></i> {{ contact.twitter }}<br></span>
                        </address>
                    </div>
                </div>
            </td>
            <td class="align-middle text-right">
                <button class="btn btn-secondary" v-on:click.prevent="showEditModal = true"><i class="fas fa-pencil-alt"></i></button>
                <form-modal :contact-data="contact"
                            :title="`Edit ${contact.first_name} ${contact.last_name}`"
                            :show="showEditModal"
                            v-on:showModal="showEditModal = value">
                </form-modal>
            </td>
        </tr>
</template>
<script>
    import FormModal from './FormModal.vue';
    export default {
        components: {
            FormModal,
        },
        props: {
            contact: {
                type: Object,
                required: true,
            },
            index: {
                type: Number,
                required: true,
            },
        },

        data() {
            return {
                showEditModal: false,
            }
        },
    }
</script>
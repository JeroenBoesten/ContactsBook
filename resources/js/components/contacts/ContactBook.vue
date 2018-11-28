<template>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Contacts</h1>
                <button class="btn btn-primary" v-on:click.prevent="showCreateContact = true"><i
                        class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <form-modal ref="createContact"
                        :show="showCreateContact"
                        v-on:showModal="showCreateContact = value"
                        v-on:contactsChanged="dataChange">

            </form-modal>
            <contact-filter v-on:contactsChanged="dataChange"></contact-filter>
            <contact-table :contacts="contacts"></contact-table>
        </div>
    </div>
</template>
<script>
    import Filter from './Filter';
    import Table from './Table';
    import FormModal from './FormModal';

    export default {
        components: {
            FormModal,
            'contact-filter': Filter,
            'contact-table': Table,
        },
        props: {
            contactsData: {
                type: Object,
                required: true,
            }
        },
        data() {
            return {
                contacts: {},
                showCreateContact: false,
            }
        },
        created() {
            this.contacts = this.contactsData;
        },
        methods: {
            dataChange (value) {
                this.contacts = value;
            }
        }
    }
</script>
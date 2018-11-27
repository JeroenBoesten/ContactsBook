<template>
    <div>
        <contact-filter v-on:contactsChanged="dataChange"></contact-filter>
        <contact-table :contacts="contacts"></contact-table>
    </div>
</template>
<script>
    import Filter from './Filter';
    import Table from './Table';

    export default {
        components: {
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
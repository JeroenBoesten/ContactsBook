<template>
    <table class="table table-striped text-left">
        <thead>
        <tr>
            <th scope="col">{{ index }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <table-row v-for="(contact, index) in contactsGroup"
                   :contact="contact"
                   :index="index"
                   ref="table-row"
                   :key="`contact_row[${index}]`">
        </table-row>
        </tbody>
    </table>

</template>
<script>
    import TableRow from './TableRow';
    export default {
        components: {
            TableRow,
        },
        props: {
            contactsGroup: {
                type: Array,
                required: true,
            },
            index: {
                type: String,
                required: true,
            },
        },
    }
</script>
<template>
    <div class="table-responsive">
        <table-group v-for="(group, index) in contacts"
                     :contactsGroup="group"
                     :index="index"
                     ref="table-group"
                     :key="`contact_group[${index}]`"
                     v-on:contactsChanged="passEventUp">
        </table-group>
    </div>
</template>
<script>
    import TableGroup from './TableGroup';
    export default {
        components: {
            TableGroup,
        },
        props: {
            contacts: {
                type: Object,
                required: true,
            }
        },
        methods: {
            passEventUp(value) {
                this.$emit('contactsChanged', value);
            },
        },
    }
</script>
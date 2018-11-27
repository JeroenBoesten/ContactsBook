<template>
    <div>
        <div class="input-group mb-4">
            <input placeholder="Zoeken... (Voornaam, Achternaam, Telefoonnummer, Twitter, Email)" name="search" type="text" class="form-control" v-model="search">
            <div class="input-group-append"><input type="button" value="Zoeken" class="btn btn-primary" v-on:click.prevent="filter"></div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                search: '',
            }
        },
        methods: {
            async filter() {
                try {
                    const response = await axios.get(`/contacts?search=${encodeURI(this.search)}`);
                    this.$emit('contactsChanged', response.data);
                } catch (e) {
                    console.log(e);
                }
            }
        },
        watch: {
            search: function () {
                this.filter();
            }
        }
    }
</script>
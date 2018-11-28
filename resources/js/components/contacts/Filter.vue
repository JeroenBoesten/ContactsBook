<template>
    <div>
        <div class="input-group mb-4">
            <input placeholder="Zoeken... (Voornaam, Achternaam, Telefoonnummer, Twitter, Email)" name="search" type="text" class="form-control" v-model="search">
            <select class="form-control" v-model="sort">
                <option value="">Sort by Alphabet</option>
                <option value="date">Sort by date added</option>
            </select>
            <div class="input-group-append"><input type="button" value="Zoeken" class="btn btn-primary" v-on:click.prevent="filter"></div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                search: '',
                sort: '',
            }
        },
        methods: {
            async filter() {
                try {
                    const response = await axios.get(`/contacts?search=${encodeURI(this.search)}&sort=${encodeURI(this.sort)}`);
                    this.$emit('contactsChanged', response.data);
                } catch (e) {
                    console.log(e);
                }
            }
        },
        watch: {
            search: function () {
                this.filter();
            },
            sort: function () {
                this.filter();
            }
        }
    }
</script>
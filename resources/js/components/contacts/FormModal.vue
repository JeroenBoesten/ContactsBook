<template>
    <div>
        <modal :title="title" :is-large="true" v-if="show" @close="$emit('showModal', false)">
            <div class="modal-body text-left">
                <!-- First & Last Name-->
                <div class="form-row">
                    <div class="col">
                        <label for="first_name" class="font-weight-bold">First name</label>
                        <input type="text" class="form-control" id="first_name" v-model="contact.first_name"
                               v-bind:class="{ 'is-invalid': errors.first_name }"
                               placeholder="Enter first name">
                        <div class="invalid-feedback ucfirst" v-if="errors.first_name">
                            {{ errors.first_name[0] }}
                        </div>
                    </div>
                    <div class="col">
                        <label for="last_name" class="font-weight-bold">Last name</label>
                        <input type="text" class="form-control" id="last_name" v-model="contact.last_name"
                               v-bind:class="{ 'is-invalid': errors.last_name }"
                               placeholder="Enter last name">
                        <div class="invalid-feedback ucfirst" v-if="errors.last_name">
                            {{ errors.last_name[0] }}
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="form-group mt-2">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea class="form-control" id="description" rows="3" v-model="contact.description"
                              v-bind:class="{ 'is-invalid': errors.description }"
                              placeholder="Description..."></textarea>
                    <div class="invalid-feedback ucfirst" v-if="errors.description">
                        {{ errors.description[0] }}
                    </div>
                </div>

                <!-- PhoneNumber -->
                <button class="btn btn-outline-success btn-block mb-2" type="button" v-show="!showPhoneNumber"
                        v-on:click="showPhoneNumber = true"><i class="fas fa-plus-circle"></i> Add phone number
                </button>
                <div class="form-group" v-show="showPhoneNumber">
                    <label for="phone_number" class="font-weight-bold">Phone number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-danger" type="button" v-on:click="showPhoneNumber = false"><i
                                    class="fas fa-minus-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" id="phone_number" placeholder="Phone number"
                               v-model="contact.phone_number" v-bind:class="{ 'is-invalid': errors.phone_number }">
                        <div class="invalid-feedback ucfirst" v-if="errors.phone_number">
                            {{ errors.phone_number[0] }}
                        </div>
                    </div>
                </div>

                <!-- EMail -->
                <button class="btn btn-outline-success btn-block mb-2" type="button" v-show="!showEmail"
                        v-on:click="showEmail = true"><i class="fas fa-plus-circle"></i> Add email
                </button>
                <div class="form-group" v-show="showEmail">
                    <label for="email" class="font-weight-bold">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-danger" type="button" v-on:click="showEmail = false"><i
                                    class="fas fa-minus-circle"></i>
                            </button>
                        </div>
                        <input type="email" class="form-control" id="email" placeholder="Email" v-model="contact.email"
                               v-bind:class="{ 'is-invalid': errors.email }">
                        <div class="invalid-feedback ucfirst" v-if="errors.email">
                            {{ errors.email[0] }}
                        </div>
                    </div>
                </div>

                <!-- Twitter -->
                <button class="btn btn-outline-success btn-block mb-2" type="button" v-show="!showTwitter"
                        v-on:click="showTwitter = true"><i class="fas fa-plus-circle"></i> Add twitter
                </button>
                <div class="form-group" v-show="showTwitter">
                    <label for="twitter" class="font-weight-bold">Twitter</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-danger" type="button" v-on:click="showTwitter = false"><i
                                    class="fas fa-minus-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" id="twitter" placeholder="Twitter"
                               v-model="contact.twitter" v-bind:class="{ 'is-invalid': errors.twitter }">
                        <div class="invalid-feedback ucfirst" v-if="errors.twitter">
                            {{ errors.twitter[0] }}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" v-on:click="$emit('showModal', false)">Cancel</button>
                <button type="button" class="btn btn-primary" v-on:click="save()">Save</button>
            </div>
        </modal>
    </div>
</template>
<script>
    export default {
        props: {
            contactData: {
                type: Object,
                required: false,
            },
            title: {
                type: String,
                required: false,
                default: 'New contact',
            },
            show: {
                type: Boolean,
                default: false,
            }
        },
        data() {
            return {
                contact: {
                    first_name: '',
                    last_name: '',
                    description: '',
                    phone_number: '',
                    email: '',
                    twitter: '',
                },
                showPhoneNumber: false,
                showEmail: false,
                showTwitter: false,
                errors: {},
            }
        },
        created() {
            if (this.contactData) {
                this.contact = this.contactData;
            }
        },
        methods: {
            async save() {
                /** Update existing contact */
                if (this.contact.id) {
                    console.log("Update method to be implemented");

                    /** Create new contact */
                } else {
                    try {
                        const response = await axios.post('/contacts', this.contact);
                        this.errors = {};
                        this.contact = {
                            first_name: '',
                            last_name: '',
                            description: '',
                            phone_number: '',
                            email: '',
                            twitter: '',
                        };
                        this.$emit('showModal', false);
                        this.$emit('contactsChanged', response.data);
                    } catch (e) {
                        this.errors = e.response.data.errors;
                    }
                }
            },
        },
        watch: {
            showPhoneNumber (val) {
                if (!val) {
                    this.contact.phone_number = '';
                }
            },
            showEmail (val) {
                if (!val) {
                    this.contact.email = '';
                }
            },
            showTwitter (val) {
                if (!val) {
                    this.contact.twitter = '';
                }
            },
        }
    }
</script>
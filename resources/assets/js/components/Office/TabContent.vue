<template>
<transition name="custom-classes-transition" enter-active-class="animated fadeIn">
    <div v-show="isTabOpen">
        <div class="box box-primary">
            <div class="box-body">

                    <header>
                            <h4 class="box-title"> {{ title }} </h4>
                    </header>
                <hr>
                  <!-- Office Name Field -->
                <div class="form-group col-sm-6">
                    <slot name="name-field"> </slot>
                    <span class="h4 text-bold">{{fields.name}}</span>
                </div>

                <!-- Type Field -->
                <div class="form-group col-sm-6">
                    <slot name="type-field"> </slot>
                    <span class="h4 text-bold">{{fields.type}}</span>
                </div>

                <!-- Activity Sector Field -->
                <div class="form-group col-sm-6">

                    <slot name="activity-sector-field"> </slot>
                    <span class="h4 text-bold">{{fields.activity_sector}}</span>
                </div>

                <!-- Workforce Field -->
                <div class="form-group col-sm-6">
                    <slot name="workforce-field"> </slot>
                    <span class="h4 text-bold">{{fields.workforce}}</span>
                </div>

                <!-- Siret Number Field -->
                <div class="form-group col-sm-6">
                    <slot name="siret-field"> </slot>
                    <span class="h4 text-bold">{{fields.siret_number}}</span>
                </div>

                <!-- Ape Number Field -->
                <div class="form-group col-sm-6">
                    <slot name="ape-field"> </slot>
                    <span class="h4 text-bold">{{fields.ape_number}}</span>
                </div>

                <!-- Phone Number Field -->
                <div class="form-group col-sm-6">
                    <slot name="phone-field"> </slot>
                    <span class="h4 text-bold">{{fields.phone_number}}</span>
                </div>


                <!-- Website Field -->
                <div class="form-group col-sm-6">
                    <slot name="website-field"> </slot>
                    <a :href="fields.website" class="h4 text-bold">{{fields.website}}</a>
                </div>

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <div v-for="address in fields.addresses">
                    <h4 v-if="address.pivot.type == 'delivery'" class="box-title">Adresse de Livraison</h4>
                    <h4 v-if="address.pivot.type == 'billing'" class="box-title">Adresse de Facturation</h4>
                    <hr>

                    <div class="form-group col-sm-6">
                        <slot name="address-name-field"> </slot>
                        <span class="h4 text-bold">{{address.name}}</span>
                    </div>


                    <div class="form-group col-sm-6">
                        <slot name="street-label-field"> </slot>
                        <span class="h4 text-bold">{{address.street_label}}</span>
                    </div>


                    <div class="form-group col-sm-6">
                        <slot name="street-detail-field"> </slot>
                        <span class="h4 text-bold">{{address.street_detail}}</span>
                    </div>


                    <div class="form-group col-sm-6">
                        <slot name="zipcode-field"> </slot>
                        <span class="h4 text-bold">{{address.zipcode}}</span>
                    </div>


                    <div class="form-group col-sm-6">
                        <slot name="city-field"> </slot>
                        <span class="h4 text-bold">{{address.city}}</span>
                    </div>

                    <div class="form-group col-sm-6">
                        <slot name="country-field"> </slot>
                        <span class="h4 text-bold">{{address.country}}</span>
                    </div>

                </div>


            </div>
        </div>



        <div class="box box-primary">
            <div class="box-body">

                <!-- Is Active Field -->
                <div class="form-group col-sm-6">
                    <slot name="is-active-field"> </slot>
                    <span v-if="fields.is_active" class="h4 text-bold">Oui</span>
                    <span v-else class="h4 text-bold">Non</span>
                </div>

                <!-- Is Main Field -->
                <div class="form-group col-sm-6">
                    <slot name="is-main-field"> </slot>
                    <span v-if="fields.is_main" class="h4 text-bold">Oui</span>
                    <span v-else class="h4 text-bold">Non</span>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <slot name="created-at-field"> </slot>
                    <span class="h4 text-bold">{{fields.created_at}}</span>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <slot name="updated-at-field"> </slot>
                    <span class="h4 text-bold">{{fields.updated_at}}</span>
                </div>
            </div>
        </div>
    </div>
    </transition>
</template>

<script type="text/babel">

 export default {

       props: ['id', 'title'],

       computed: {

            isTabOpen: function() {
                return this.$root.tabState[this.id];
            },

            isLoaded: function() {
                return Object.keys(this.$root.tabContent).length;
            }

         },

        data: function() {

            return  {

                fields : {

                    name: "",
                    type: "",
                    activity_sector: "",
                    workforce: "",
                    siret_number: "",
                    ape_number: "",
                    phone_number: "",
                    website: "",
                    is_active: "",
                    is_main: "",
                    created_at: "",
                    updated_at: "",
                    addresses: []

                },
            }
        },

        methods: {

            loadTabContent: function() {

                this.$set(this.$data, 'fields', this.$root.tabContent[this.id]);

            }

        },

        watch: {

                'isLoaded' : 'loadTabContent'

        }
    }

</script>


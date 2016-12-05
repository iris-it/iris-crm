<template>
<transition name="custom-classes-transition" enter-active-class="animated fadeIn">
    <div v-show="isTabOpen">

                <hr>
                  <!-- Topic Field -->
                <div class="form-group col-sm-6">
                    <slot name="topic-field"> </slot>
                    <span class="h4 text-bold">{{fields.topic}}</span>
                </div>

                <!-- Phase Field -->
                <div class="form-group col-sm-6">
                    <slot name="phase-field"> </slot>
                    <span class="h4 text-bold">{{fields.phase}}</span>
                </div>

                <!-- Deadline Field -->
                <div class="form-group col-sm-6">

                    <slot name="deadline-field"> </slot>
                    <span class="h4 text-bold">{{fields.deadline}}</span>
                </div>

                <!-- Description Field -->
                <div class="form-group col-sm-6">
                    <slot name="description-field"> </slot>
                    <span class="h4 text-bold">{{fields.description}}</span>
                </div>

                <!-- HT Price Field -->
                <div class="form-group col-sm-6">
                    <slot name="htprice-field"> </slot>
                    <span class="h4 text-bold">{{fields.ht_price}}</span>
                </div>

                <!-- TTC Price Field -->
                <div class="form-group col-sm-6">
                    <slot name="ttcprice-field"> </slot>
                    <span class="h4 text-bold">{{fields.ttc_price}}</span>
                </div>

                <!-- Special Conditions Field -->
                <div class="form-group col-sm-6">
                    <slot name="special-conditions-field"> </slot>
                    <span class="h4 text-bold">{{fields.special_conditions}}</span>
                </div>


                <hr>

                <!-- Is Converted Field  -->
                <div v-if='type == "invoice"' class="form-group col-sm-6">
                    <slot name="converted-field"> </slot>
                    <span v-if="fields.converted" class="h4 text-bold">Oui</span>
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

    </transition>
</template>

<script type="text/babel">

 export default {

       props: ['id', 'title', 'type'],

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

                    topic: "",
                    phase: "",
                    deadline: "",
                    description: "",
                    ht_price: "",
                    ttc_price: "",
                    special_conditions: "",
                    converted: "",
                    created_at: "",
                    updated_at: "",

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


<template>
    <div class="col-sm-12">
        <header>
                <h4> {{ title }} </h4>
        </header>

        <div class="form-group col-sm-6">
           <slot name="name-field"> </slot>
           <input type="text" id="name" :name="this.mapNameAttribute('name')" v-model="fields.name" class="form-control" >
        </div>

        <div class="form-group col-sm-6">

            <slot name="street-label-field"> </slot>
            <input type="text" id="street_label" :name="this.mapNameAttribute('street_label')" v-model="fields.street_label" class="form-control" >

        </div>

        <div class="form-group col-sm-6">
            <slot name="street-detail-field"> </slot>
            <input type="text" id="street_detail" :name="this.mapNameAttribute('street_detail')" v-model="fields.street_detail" class="form-control" >

        </div>
        <div class="form-group col-sm-6">
            <slot name="zipcode-field"> </slot>
            <input type="text" id="zipcode" :name="this.mapNameAttribute('zipcode')" v-model="fields.zipcode" class="form-control" >

        </div>
        <div class="form-group col-sm-6">
            <slot name="city-field"> </slot>
            <input type="text" id="city" :name="this.mapNameAttribute('city')" v-model="fields.city" class="form-control" >
        </div>
        <div class="form-group col-sm-6">
            <slot name="country-field"> </slot>
            <input type="text" id="country" :name="this.mapNameAttribute('country')" v-model="fields.country" class="form-control" >
        </div>

            <input type="hidden" id="type" :name="this.mapNameAttribute('type')" :value="type" class="form-control" >


    </div>
</template>


<script type="text/babel">

 export default {

       props: ['id', 'title', 'type'],

       created: function() {

          this.$set(this.$root.addressData, this.id, this.$data.fields);

       },

       computed: {

             syncState: function() {

                return this.$store.getters.queue.includes(this.id);

             }
         },

        data: function() {

            return  {

                fields : {
                        name : "",
                        street_label : "",
                        street_detail : "",
                        zipcode : "",
                        city : "",
                        country : ""
                },
            }
        },

        methods: {

             syncChanges: function() {

                 if(this.syncState == true) {

                 this.$set(this.$data, 'fields', this.$root.addressData[this.id]);
                 this.$store.commit('FLUSH', this.id);
                 }
             },

              mapNameAttribute: function(name) {

                 return "addresses[" + this.id + "][" + name +"]";

              }
         },


        watch : {

                 'syncState' : 'syncChanges',
        }



    }

</script>

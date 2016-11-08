<template>
    <div class="col-sm-12">
        <header>
                <h4> {{ title }} </h4>
        </header>

        <div class="form-group col-sm-6">
           <slot name="name-field"> </slot>
           <input type="text" id="name" name="name" v-model="fields.name" class="form-control" >
        </div>

        <div class="form-group col-sm-6">

            <slot name="street-label-field"> </slot>
            <input type="text" id="street_label" name="street_label" v-model="fields.street_label" class="form-control" >

        </div>

        <div class="form-group col-sm-6">
            <slot name="street-detail-field"> </slot>
            <input type="text" id="street_detail" name="street_detail" v-model="fields.street_detail" class="form-control" >

        </div>
        <div class="form-group col-sm-6">
            <slot name="zipcode-field"> </slot>
            <input type="text" id="zipcode" name="zipcode" v-model="fields.zipcode" class="form-control" >

        </div>
        <div class="form-group col-sm-6">
            <slot name="city-field"> </slot>
            <input type="text" id="city" name="city" v-model="fields.city" class="form-control" >
        </div>
        <div class="form-group col-sm-6">
            <slot name="country-field"> </slot>
            <input type="text" id="country" name="country" v-model="fields.country" class="form-control" >
        </div>

            <input type="hidden" id="type" name="type" :value="type" class="form-control" >


    </div>
</template>


<script type="text/babel">

 export default {

       props: ['id', 'title', 'type'],

       created: function() {
          console.log('test 3');
          this.$set(this.$root.addressData, this.id, this.$data.fields);

       },

       computed: {


             saveState: function() {

                return this.id == this.$store.getters.saveState;
             },

             syncState: function() {

                return this.id == this.$store.getters.copyState;

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

             saveChanges: function() {

                if(this.saveState) {

                 this.$set(this.$root.addressData, this.id, this.$data.fields);
                 this.$store.commit('SAVE_RESET');

                }

             },

             syncChanges: function() {

                 if(this.syncState) {

                 this.$set(this.$data, 'fields', this.$root.addressData[this.id]);
                 this.$store.commit('COPY_RESET');

                 }
             }
         },


        watch : {

                 'saveState' : 'saveChanges',
                 'syncState' : 'syncChanges',
        }



    }

</script>

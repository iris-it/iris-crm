<template>
    <div>
        <div class="box box-primary">
            <div class="box-body">

                    <header>
                            <h4 class="box-title"> {{ title }} </h4>
                    </header>
                <hr>
                  <!-- Office Name Field -->
                <div class="form-group col-sm-6">
                    <slot name="name-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Type Field -->
                <div class="form-group col-sm-6">
                    <slot name="type-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Activity Sector Field -->
                <div class="form-group col-sm-6">

                    <slot name="activity-sector-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Workforce Field -->
                <div class="form-group col-sm-6">
                    <slot name="workforce-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Siret Number Field -->
                <div class="form-group col-sm-6">
                    <slot name="siret-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Ape Number Field -->
                <div class="form-group col-sm-6">
                    <slot name="ape-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Phone Number Field -->
                <div class="form-group col-sm-6">
                    <slot name="phone-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>


                <!-- Website Field -->
                <div class="form-group col-sm-6">
                    <slot name="website-field"> </slot>
                    <a href="" class="h4 text-bold"> </a>
                </div>

            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                <h4 class="box-title">Adresses</h4>
                <hr>




            </div>
        </div>



        <div class="box box-primary">
            <div class="box-body">*

                <!-- Is Active Field -->
                <div class="form-group col-sm-6">
                    <slot name="is-active-field"> </slot>
                    <span class="h4 text-bold"> </span>
                </div>

                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    <slot name="created-at-field"> </slot>
                    <span class="h4 text-bold"></span>
                </div>

                <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    <slot name="updated-at-field"> </slot>
                    <span class="h4 text-bold"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">

 export default {

       props: ['id', 'title'],

       created: function() {


       },

       computed: {

         },

        data: function() {

            return  {

                fields : {

                },
            }
        },

        methods: {


         },


        watch : {


        }



    }

</script>


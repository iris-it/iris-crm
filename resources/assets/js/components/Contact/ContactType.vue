<template>

  <div class="form-group col-sm-6">
      <label for="type">Type :</label>
      <select id="type" v-model="selectedType" name="type" class="form-control">
      <option v-for="type in types" value="{{type.value}}"> {{type.text}} </option>
      </select>
  </div>

  <!-- Account Name Field -->

  <div class="form-group col-sm-6" v-if="selectedType == 1">
      <label for="account_name_id"> {{ accountType }} :</label>
       <select id="account_name_id" name="account_name_id" class="form-control">
      <option v-for="(index,account) in accounts" value="{{index}}"> {{account}} </option>
            </select>
  </div>

  <div class="form-group col-sm-6"  v-if="selectedType == 0">
      <label for="lead_name_id"> {{ prospectType }} :</label>
       <select id="lead_name_id" name="lead_name_id" class="form-control">
      <option v-for="(index,lead) in leads" value="{{index}}"> {{lead}} </option>
            </select>
  </div>

</template>

<script type="text/ecmascript-6">
    export default {

        props: ['accounts', 'leads'],

        created() {

        this.accounts = JSON.parse(this.accounts);
        this.leads = JSON.parse(this.leads);

        },

        data() {

            return {

              selectedType : 1,
              accountType : 'Contact associé à un compte',
              prospectType : 'Contact associé à un prospect',

                types : [

                {text: 'Contact associé à un compte', value: 1},
                {text: 'Contact associé à un prospect', value: 0}

                ]

            };

        }
    };

</script>

<style>

</style>
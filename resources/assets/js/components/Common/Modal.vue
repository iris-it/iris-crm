<template>
        <div class="modal" @click="closeModal" v-show="isModalOpen">
          <div class="modal-dialog">
            <div class="modal-content" @click.stop="" v-show="isModalOpen"  >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">@{{title}}</h4>
              </div>
              <div class="modal-body">
                <slot></slot>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</template>

<style>

</style>

<script type="text/babel">

    export default {

        props: ['title'],

        computed: {

            isModalOpen: function() {

                return this.$root.modalIsOpen;

            }
        },

        methods: {

            closeModal: function() {

                this.$root.modalIsOpen = false;
            }

        }

    }
</script>

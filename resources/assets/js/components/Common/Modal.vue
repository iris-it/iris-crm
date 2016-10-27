<template>

<transition name="custom-classes-transition" enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
<div @click="closeModal" v-show="isModalOpen" class="Modal u-overlay animated">
   <transition name="custom-classes-transition" enter-active-class="animated fadeInDown" leave-active-class="animated fadeOutUp">
    <div @click.stop="" v-show="isModalOpen" transition="fadeWithMove" class="Modal__container animated">
            <header class="Modal__header">
                <h1>
                    {{ title }}
                </h1>
            </header>

            <div class="Modal__content">
                <slot></slot>
            </div>

            <footer class="Modal__footer"></footer>
        </div>
        </transition>
    </div>
     </transition>
</template>


<script type="text/babel">

    export default {

        props: ['id', 'title'],

        created: function() {
            this.closeModal();
        },

        computed: {

            isModalOpen: function() {

               var id = this.id;

               return this.$root.modalState[id];

            }
        },

        methods: {

            closeModal: function() {

                 this.$root.$set(this.$root.modalState, this.id, false);
            }

        }

    }
</script>

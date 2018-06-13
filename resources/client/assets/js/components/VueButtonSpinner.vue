<template>
    <button class="vue-btn" :class="getBackgroundClass" :type="getType">

        <transition name="fade" mode="out-in">
            <div :class="getSpinnerClass"></div>
        </transition>

        <slot v-if="showSlot"></slot>
    </button>
</template>

<script>
  export default {
    props: {
      isLoading: {
        type: Boolean,
        default: false
      },
      status: {
        type: String | Boolean,
        default: ''
      },
      type: {
        type: String,
        default: 'submit'
      }
    },
    computed: {
      getSpinnerClass () {
        return {
          'spinner fa fa-circle-o-notch fa-spin': this.loading,
          'check': !this.emptyStatus && this.isSuccess && !this.loading,
          'cross': !this.emptyStatus && !this.isSuccess && !this.loading
        }
      },
      getBackgroundClass () {
        return {
          'vue-btn-loader-error': !this.emptyStatus && !this.isSuccess,
          'vue-btn-loader-success': this.isSuccess,
          'is-loading': this.loading
        }
      },
      loading () {
        return this.isLoading
      },
      getType() {
        return this.type
      },
      isSuccess () {
        return this.status === 'success' || this.status === true
      },
      emptyStatus () {
        return this.status === ''
      },
      showSlot () {
        return (this.loading) || (!this.loading && this.emptyStatus)
      }
    }
  }

</script>

<style lang="css" scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 1s;
    }

    .fade-enter,
    .fade-leave-active {
        opacity: 0;
        will-change: opacity;
    }

    .vue-btn {
        -moz-appearance: none;
        -webkit-appearance: none;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-shadow: none;
        box-shadow: none;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        position: relative;
        vertical-align: top;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        text-align: center;
        white-space: nowrap;
        transition: .3s all ease;
    }

    button.vue-btn-loader-error:not(.is-loading) {
        width: 48px;
        background-color: #F44336;
        color: #fff;
    }

    button.vue-btn-loader-success:not(.is-loading) {
        width: 48px;
        background-color: #8BC34A;
        color: #fff;
    }

    button.vue-btn:disabled {
        cursor: not-allowed;
    }

    /**
          Spinner Icon
      **/

    .spinner {
        margin-right: 8px;
        opacity: 1;
        filter: alpha(opacity=100);
        transition: .3s all ease;
    }

    /**
          Check Icon
      **/

    .check {
        display: inline-block;
        width: 23px;
        height: 24px;
        border-radius: 50%;
        transform: rotate(45deg);
        color: white;
        will-change: transform;
    }

    .check:before {
        content: "";
        position: absolute;
        width: 3px;
        height: 9px;
        background-color: #fff;
        left: 11px;
        top: 6px;
    }

    .check:after {
        content: "";
        position: absolute;
        width: 3px;
        height: 3px;
        background-color: #fff;
        left: 8px;
        top: 12px;
    }

    /**
          Cross Icon
      **/

    .cross {
        display: inline-block;
        width: 17px;
        height: 16px;
        position: relative;
    }

    .cross:before,
    .cross:after {
        position: absolute;
        left: 8px;
        content: ' ';
        height: 16px;
        width: 2px;
        background-color: #fff;
    }

    .cross:before {
        transform: rotate(45deg);
        will-change: transform;
    }

    .cross:after {
        transform: rotate(-45deg);
        will-change: transform;
    }

</style>

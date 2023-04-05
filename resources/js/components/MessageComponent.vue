<template>
    <div v-if="sessionData.success" class="alert alert-success">
        {{ this.sessionData.success }}
    </div>
    <div v-if="sessionData.error" class="alert alert-danger">
        {{ this.sessionData.error }}
    </div>
</template>

<script>
export default {
  props: {
    sessionData: {
      type: Object,
      default: function () {
        return {};
      }
    }
  },
};
</script>
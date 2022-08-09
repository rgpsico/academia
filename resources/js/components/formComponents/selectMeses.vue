<template>
      <div :class="colmd">
        <div class="form-group">
          <label for="periodo_start">{{label}}</label>
          <select name="periodo_start" id="periodo_start" class="form-control">
            <option value="Janeiro">Janeiro</option>
            <option value="Janeiro">Fevereiro</option>
            <option value="Janeiro">Março</option>
            <option value="Janeiro">Abril</option>
            <option value="Janeiro">Abril</option>
            <option value="Janeiro">Abril</option>
            <option value="Janeiro">Abril</option>
          </select>
        </div>
      </div>
</template>
<script>
import axios from "axios";
const default_layout = "default";

export default {
     props: {
    colmd: String,
    label: String
  },
  name: "selectMeses",
  computed: {},
  data() {
    return {
      message: "hello word",
    };
  },
  
};
</script>
<template>
    <div class="_suggest">
        <span class="name">Allergies</span>
        <div class="_target">
            <div class="_selected">
                <form role="form">
                    <div class="vc" v-for="allergy in allergies" >
                        <div class="vl">
                            {{allergy.name}}
                            <span v-on:click="remove_illness(allergy.id)">
                                <i class="ti-close"></i>
                            </span>
                        </div>
                    </div>
                    <input type="text"
                        placeholder="..."
                        autocomplete="off"
                        v-model="query"
                        @keydown.down="down"
                        @keydown.up="up"
                        @keydown.enter="hit"
                        @keydown.esc="reset"
                        @blur="reset"
                        @input="update"/>
                    <ul v-show="hasItems">
                        <li v-for="(item, $item) in items" :class="activeClass($item)" @mousedown="hit" @mousemove="setActive($item)">
                            <span v-text="item.name"></span>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    import VueTypeahead from 'vue-typeahead'

    export default {

      extends: VueTypeahead, // vue@1.0.22+

      mounted: function() {
          this.fetchConditions()
      },

      data () {
        return {
          // The source url
          // (required)
          src: '/service/v1/allergies',

          // The data that would be sent by request
          // (optional)
          data: [],

          // Limit the number of items which is shown at the list
          // (optional)
          limit: 5,

          // The minimum character length needed before triggering
          // (optional)
          minChars: 3,

          // Highlight the first item in the list
          // (optional)
          selectFirst: false,

          allergies: [],
        }
      },

      methods: {

        fetchConditions: function() {
            this.$http.get('/service/v1/patients/' + this.$route.params.id + '/allergies').then(response => this.allergies = response.data.data);
        },

        handleSubmitIllness : function(event) {
            this.$http.post('/service/v1/patients/' + this.$route.params.id, {method:'add',illness:this.common_illnesses})
                .then(response => {
                    this.patient.common_illnesses = response.data.data.common_illnesses;
                    this.common_illnesses = '';
                    this.text = '';
                })
        },

        remove_illness :function(index){
            this.$http.delete('/service/v1/patients/' + this.$route.params.id+'/allergies/'+index)
                .then(response => {
                    this.allergies = response.data.data
                })
        },

        // The callback function which is triggered when the user hits on an item
        onHit (item) {
            this.$http.post('/service/v1/patients/' + this.$route.params.id + '/allergies', {allergy: item.name})
                .then(response => {
                     this.allergies = response.data.data                 
                })
        },

        // The callback function which is triggered when the response data are received
        // (optional)
        prepareResponseData (response) {
          // data = ...
          return response.data
        }
      }
    }
</script>

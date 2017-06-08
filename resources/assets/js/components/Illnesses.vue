<template>
    <div class="_suggest">
        <span class="name">Illnesses</span>
        <div class="_target">
            <div class="_selected">
                <form role="form">
                    <div class="vc" v-for="illness in illnesses" >
                        <div class="vl">
                            {{illness.name}}
                            <span v-on:click="remove_illness(illness.id)">
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
        <hr/>
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
          src: '/service/v1/illnesses',

          // The data that would be sent by request
          // (optional)
          data: {},

          // Limit the number of items which is shown at the list
          // (optional)
          limit: 5,

          // The minimum character length needed before triggering
          // (optional)
          minChars: 3,

          // Highlight the first item in the list
          // (optional)
          selectFirst: false,

          illnesses: [],
        }
      },

      methods: {

        fetchConditions: function() {
            this.$http.get('/service/v1/patients/' + this.$route.params.id + '/illnesses').then(response => this.illnesses = response.data.data);
        },

        remove_illness :function(index){
            this.$http.delete('/service/v1/patients/' + this.$route.params.id+'/illnesses/'+index)
                .then(response => {
                    this.illnesses = response.data.data
                })
        },

        // The callback function which is triggered when the user hits on an item
        onHit (item) {
            this.$http.post('/service/v1/patients/' + this.$route.params.id + '/illnesses', {illness: item.name})
                .then(response => { 
                    this.illnesses = response.data.data         
                })
        },

        // The callback function which is triggered when the response data are received.
        prepareResponseData (response) {
          return response.data
        }
      }
    }
</script>

<template>	
		<div class="col-md-4 mb25">
			<div class="sidebar-wapper"></div>
			<div class="panel overflow-hidden no-b profile p15  _right-panel">
				<ul class="tabs">
					<li v-on:click="tabSelector('Background')" v-bind:class="{ active: tabSelectorCheck('Background') }">Background</li>
					<li v-on:click="tabSelector('History')" v-bind:class="{ active: tabSelectorCheck('History') }">History</li>
					<li v-on:click="tabSelector('Notes')" v-bind:class="{ active: tabSelectorCheck('Notes') }">Notes</li>
				</ul>
				<div v-if="activeTab == 'Background'">
					<illnesses/>
					<allergies/>
				</div>
				<div v-if="activeTab == 'History'">
					<prescriptions/>
					<diagnostics/>
				</div>
				<div v-if="activeTab == 'Notes'">
					<notes/>
				</div>
			</div>
		</div>	
</template>

<script>

	import VueTypeahead from 'vue-typeahead'

    export default {

		extends: VueTypeahead,

        data: function() {
            return {
				current: 0,
				activeTab: 'Background',
				common_allergies: ''
            }
        },
        mounted: function() {
            this.fetchPatient()
        },
        methods: {          
			tabSelectorCheck:function(index){
				return index == this.activeTab;
			},
			tabSelector:function(index) {
				this.activeTab = index;
			},
        }
    }
</script>

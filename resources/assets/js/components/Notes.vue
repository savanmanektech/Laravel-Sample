<template>
    <div class="_suggest">
        <form role="form" v-on:submit.prevent="handleSubmitNotes">
            <textarea type="text" v-model="note" class="form-control" placeholder="Note"/>
            <div class="pull-right"><button class="btn btn-success" type="submit">Save Note</button></div>
            <div class="clearfix"></div>
            <li  v-for="note in notes">
                <span class="_note_update_date">{{note.updated_at}} </span>
                <span class="_note_title">{{note.note}}</span>
            </li>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchNotes()
        },
        data() {
            return {
                notes: [],
                note: '',
            }
        },
        methods: {
            fetchNotes() {
                this.$http.get('/service/v1/patients/' + this.$route.params.id + '/notes').then(response => this.notes = response.data.data);
            },
            handleSubmitNotes(event) {
                this.$http.post('/service/v1/patients/' + this.$route.params.id + '/notes', {note: this.note})
                    .then(response => {
                            this.notes.push(response.data.data);
                            this.note = '';
                    })
            },
        },
    }
</script>

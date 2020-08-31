<template>
    <div class="section">
        <b-field label="Name">
            <b-input v-model="form.name"></b-input>
        </b-field>
        <b-field label="Edad">
            <b-input v-model="form.age" type="number"></b-input>
        </b-field>
        <b-button @click.prevent="addName">ADD</b-button>
        <hr>
        <ul>
            <li v-for="parametro in parametros" :key="parametro.id">
                {{ parametro.temperature }}
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    mounted() {
        axios.get('/api/parametros')
        .then(res => {
            this.parametros = res.data
        })
        Echo.channel('parametro').listen('NewParametro', (e) => {
            this.parametros.splice(-1)
            this.parametros.splice(0, 0, e.parametro)
        })
    },
    data() {
        return {
            form: {
                name: '',
                age: 0
            },
            persons: [],
            parametros: []
        }
    },
    methods: {
        addName() {
            axios.post('/api/person', this.form)
            .then(res => {
            })
        }
    }
}
</script>
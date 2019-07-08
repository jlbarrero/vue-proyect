<template>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h5>Listado de personas</h5>
                </div>
                <div class="col-sm-2">
                    <router-link :to="{name: 'New'}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Adicionar
                    </router-link>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>No. Id</th>
                        <th>Cant. Hijos</th>
                        <th>Raza</th>
                        <th>Salario</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="person in paginated(persons)">
                        <th> {{person.nombres}}</th>
                        <th> {{person.apellidos}}</th>
                        <th> {{person.edad}}</th>
                        <th> {{person.sexo}}</th>
                        <th> {{person.fechaNac.date}}</th>
                        <th> {{person.noId}}</th>
                        <th> {{person.cantHijos}}</th>
                        <th> {{person.raza}}</th>
                        <th> ${{person.salario}}</th>
                        <th> {{person.cargo}}</th>
                        <td>
                            <router-link :to="{name:'Edit',params:{id:person.id}}" class="fa fa-edit"
                                         title="Editar persona"></router-link>
                            <button class="btn btn-sm btn-reset" v-on:click="delPerson(person)"
                                    title="Eliminar persona"><i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <b-pagination align="center" :total-rows="persons.length" v-model="firstPage" :per-page="10">
                    </b-pagination>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import bPagination from "bootstrap-vue/es/components/pagination/pagination";

    export default {
        name: 'ListPerons',
        props: {},
        computed: mapState(['persons']),
        mounted: function () {
            this.$store.dispatch('listPerson')
        },
        data() {
            return {
                findPerson:'',
                firstPage: 1,
                personForPage: 10
            };
        },
        methods: {
            paginated(items) {
                const init = (this.firstPage - 1) * this.personForPage;
                const end = init + this.personForPage > items.length
                    ? items.length
                    : init + this.personForPage;
                return items.slice(init, end);
            },
            delPerson(person) {
                this.$store.dispatch('delPerson', {person: person})
            }
        },
        components: {bPagination}
    };
</script>
